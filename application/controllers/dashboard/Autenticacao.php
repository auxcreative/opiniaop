<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

Class Autenticacao extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		init_login();
		
		
	}

	public function index() {

		//Faz o retorno para o dashboard caso ja tenha feito login
		if ($this -> session -> userdata('user_logado') == TRUE) redirect(base_url('dashboard/home'));
		
		//Plano
		$planos = array('select',
						'table'=>'plano',
						'where'=>array('status'=>'a'));
						
		//Sql				
		$plan['plano'] = $this->crud->select($planos)->result();
		
		

		//Carrega o conteudo da view
		set_tema('footerinc', load_js(array('site/js/load_pages')), FALSE);
		set_tema('conteudo', load_modulo_dash('view_dash_autenticacao',$plan), FALSE);
		load_template();

	}
	
	public function email(){

		$this->load->view('site/view_email_marketing');	
		
	}

	//Login

	public function validacao($url='') {

		//Faz o retorno para o dashboard caso ja tenha feito login
		if ($this -> session -> userdata('user_logado') == TRUE)redirect(base_url('dashboard/home'));

		//Validação dos dados
		$this -> form_validation -> set_rules('email', 'email', 'required|valid_email');

		//validacao email
		if ($this -> form_validation -> run()) {
			$user = $this -> input -> post('email');
			$password = sha1($this -> input -> post('senha'));

			//Verifica se esse email existe no cadastro
			$sqlEmail = array('table' => 'cliente', 'where' => array('email' => $user), 'limit' => array(1));

			$loginEmail = $this -> crud -> select($sqlEmail);

			if ($loginEmail -> num_rows() == 0) {

				set_msg('login', 'Essa conta não existe. Entre com um email diferente ou clique em <b> Criar minha conta</b>', 'default');
				redirect(base_url('dashboard'));

			} else {

				//Salva o email numa sessão
				$this -> session -> set_userdata('log_email', $this -> input -> post('email'));

				$this -> form_validation -> set_rules('senha', 'senha', 'required|trim');

				if ($this -> form_validation -> run()) {

					//Tras verfica a senha
					$sqlUser = array('table' => 'cliente', 'where' => array('email' => $user, 'senha' => $password), 'limit' => array(1));
					//Carrega dados
					$login = $this -> crud -> select($sqlUser);

					if ($login -> num_rows() != 0) {

						if ($login -> row('status') == 'a') :
							$login = $login -> row();

							//Apaga sessão do log Email
							$this -> session -> unset_userdata('log_email');

							//Cria sessão dos dados do usuário
							$sessao = array('user_logado' => true, 
											'user_id'   => $login->id,
											'user_nome' => $login -> nome, 
											'user_email' => $login -> email, 
											'user_idplano' => $login -> id_plano, 
											'user_fone' => $login -> fone, 
											'user_ip' => $user -> ip);
							
							$this -> session -> set_userdata($sessao);

							//Direciona usuário para main do dashboard
							redirect(base_url('dashboard/home'));
						else :
							$this -> session -> unset_userdata('log_email');
							set_msg('login', 'Seu acesso foi desautorizado! Por favor entrar em contato através do site', 'info');
							redirect(base_url('dashboard'));

						endif;

					} else {
						//
						set_msg('login', 'Email ou senha incorreto. Clique em <b>Recuperar senha</b>', 'danger');
						redirect(base_url('dashboard'));
					}
					//Validação login - fim
				} else {

					set_msg('login', 'Por favor digite sua senha', 'default');
					redirect(base_url('dashboard'));

				}
			}

		} else {

			set_msg('login', 'Não foi possível fazer o login', 'default');
			redirect(base_url('dashboard'));
		}

	}

	public function criar_conta($url='') {
		
				//Faz o retorno para o dashboard caso ja tenha feito login
		if ($this -> session -> userdata('user_logado') == TRUE) redirect(base_url('dashboard/home'));
		
		//Plano
		$planos = array('select',
						'table'=>'plano',
						'where'=>array('status'=>'a'));
						
		//Sql				
		$plan['plano'] = $this->crud->select($planos)->result();
			
		$this->form_validation -> set_message('is_unique','<strong>{field}</strong> já existente!');	
		$this -> form_validation -> set_rules('nome', 'Nome', 'required|trim');
		$this -> form_validation -> set_rules('email', 'Email', 'required|trim|valid_email|is_unique[cliente.email]');
		$this -> form_validation -> set_rules('ddd', 'DDD', 'required|trim|numeric');
		$this -> form_validation -> set_rules('fone', 'Celular', 'required|trim|is_unique[cliente.fone]|numeric');
		$this -> form_validation -> set_rules('senha', 'senha', 'required|trim');
		$this -> form_validation -> set_rules('id_plano', 'Plano', 'required|trim');
		
		if ($this -> form_validation -> run()) {

			$dados = elements(array('nome', 'email','senha','fone','id_plano'), $this -> input -> post());

			$dados['ddd'] = '0'.$this -> input -> post('ddd');
			$dados['status'] = 'a';
			$dados['senha'] =  sha1($this -> input -> post('senha'));

			$retorno = $this -> crud -> insert('cliente', $dados);
			
			$this -> session -> set_userdata('log_email', $this -> input -> post('email'));
			set_msg('login', 'Faça seu login!', 'default');
			redirect(base_url('dashboard/autenticacao/'));

		}//end validacao
		
		//Carrega o conteudo da view
		set_tema('footerinc', load_js(array('site/js/load_pages', 'dash/assets/js/validator.aux')), FALSE);
		set_tema('conteudo', load_modulo_dash('view_dash_autenticacao',$plan), FALSE);
		load_template();		
				
	}

	public function recupera_senha($url='') {
		
				//Faz o retorno para o dashboard caso ja tenha feito login
		if ($this -> session -> userdata('user_logado') == TRUE) redirect(base_url('dashboard/home'));
		
		date_default_timezone_set('America/Sao_Paulo');
		
		
		//Plano
		$planos = array('select',
						'table'=>'plano',
						'where'=>array('status'=>'a'));
						
		//Sql				
		$plan['plano'] = $this->crud->select($planos)->result();		

			
		//Validação dos dados
		$this -> form_validation -> set_rules('email', 'Email', 'required|valid_email');

		//validacao email
		if ($this -> form_validation -> run()) {

			$user = $this -> input -> post('email');

			//Verifica se esse email existe no cadastro
			$sqlEmail = array('table' => 'cliente', 
			'where' => array('email' => $user), 
			'limit' => array(1));

			$loginEmail = $this -> crud -> select($sqlEmail);
			
		

			if ($loginEmail -> num_rows() == 0) {

				set_msg('recover', 'Essa conta não existe. Por favor, entre com o email correto para <b>Recuperação do acesso</b>', 'default');
				redirect(base_url('dashboard/autenticacao/recupera_senha'));

			} else {
				
				$senha = random_string('alnum',5);
				
				//Muda a senha do usuário
				$dados['senha'] = sha1($senha);
				
				$up = $this->crud->update('cliente',array('email'=>$user),$dados);
				
				
				if($up):
				
				//gerar token e envia email
				$token = encode_aux($loginEmail->row('id'));
				//dados do token
				$tkn = array('destino'=>'Alteração de senha de: '.$loginEmail->row('nome'),
							 'token_id'=>$token,
							 'id_destinatario'=>$loginEmail->row('id'),
							 'status'=>'a',
							 'gerado'=>date('Y-m-d H:i:s'));
				//Inserir	 
				$this->crud->insert('token',$tkn);	
									
				//Evia email
				//Carrego a biblioteca de email do CI
				$this -> load -> library('email');
								
				$this->email->from('contato@opiniaopop.com.br', 'Recuperação de Acesso');
				$this->email->to($this->input->post('email'));

				$this->email->subject('Opiniãopop - Recuperação de Acesso');
				$this->email->message(msgEmail($loginEmail->row('nome'),$token));
				
				
				$this -> email -> send();
				
				
				set_msg('recover', 'Em alguns segundos enviaremos um link para o seu email! Clieque e altere sua senha', 'info');
				redirect(base_url('dashboard/autenticacao/recupera_senha'));
				
				else:

				set_msg('recover', 'Não foi possivel enviar sua alteração de senha por email!', 'default');
				redirect(base_url('dashboard/autenticacao/recupera_senha'));					
					
				endif;

			}

		}

		//Carrega o conteudo da view
		set_tema('footerinc', load_js(array('site/js/load_pages', 'dash/assets/js/validator.aux')), FALSE);
		set_tema('conteudo', load_modulo_dash('view_dash_autenticacao',$plan), TRUE);
		load_template();

	}

	public function alterar_senha_de_usuario($token=''){
		
				//Faz o retorno para o dashboard caso ja tenha feito login
		if ($this -> session -> userdata('user_logado') == TRUE) redirect(base_url('dashboard/home'));
		
		
		//Data e hora da consulta
		date_default_timezone_set('America/Sao_Paulo');

		//Plano
		$tkn = array('select'=>'token.*, cliente.id as cliente_id', 
						'table'=>'token',
						'where'=>array('token.status'=>'a',
									   'HOUR(TIMEDIFF("'.date('Y-m-d H:i:s').'", opn_token.gerado)) <=' => 3,
									    'token_id'=> $token),
										'join'=>array('cliente','cliente.id=token.id_destinatario'));
		
		//Sql				
		$retorno = $this->crud->select($tkn);
				
		if($retorno->row('status') == 'u' || $retorno->num_rows() == 0){
		set_msg('recover','Tempo para recuperação expirou. Por favor reenvie outro email de recuperação','default');
		redirect('dashboard/autenticacao/recupera_senha');
		}
		
		//retorna caso não tenga		
		$confirma = array('select',
						   'table'=>'cliente',
						   'where'=>array('id'=>$retorno->row('cliente_id'))
						   );
						   
		$user = $this->crud->select($confirma);
		$usuario['usuario'] = $user->row();
		
				
				
		$this->form_validation->set_rules('password','Senha','required');
		
		//Validacao
		
		if($this->form_validation->run()){
					
		if($user->num_rows() > 0):		
				
			$this->crud->update('cliente', array('id'=> $user->row('id'), 'senha'=> $user->row('senha')), 
										   array('senha'=> sha1($this->input->post('password'))));
										   
			$this->crud->update('token', array('id'=>$retorno->row('id')),array('status'=>'u'));
			
			$this -> session -> set_userdata('log_email', $user->row('email'));
			set_msg('login', 'Senha alterada! Faça seu <i class="fa fa-unlock-alt" aria-hidden="true"></i> <b>Login</b>', 'success');				
			redirect('dashboard/autenticacao/');	
		
		endif;
		
			
		}

		//Carrega o conteudo da view
		
		set_tema('conteudo', load_modulo_dash('view_dash_autenticacao', $usuario));
		load_template();

		
		}

	public function logout($value=''){
		
		esta_logado();
		
		$this->session->sess_destroy();
		redirect(base_url());
		
	}

}
