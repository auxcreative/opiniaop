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
		if ($this -> session -> userdata('user_logado') == TRUE)
			redirect(base_url('dashboard/main'));

		//Carrega o conteudo da view
		set_tema('footerinc', load_js(array('site/js/load_pages', 'dash/assets/js/validator.aux')), FALSE);
		set_tema('conteudo', load_modulo_dash('view_dash_login'), FALSE);
		load_template();

	}

	//Login

	public function validacao() {

		//Faz o retorno para o dashboard caso ja tenha feito login
		if ($this -> session -> userdata('user_logado') == TRUE)
			redirect(base_url('dashboard/main'));

		//Validação dos dados
		$this -> form_validation -> set_rules('email', 'email', 'required');

		//validacao email
		if ($this -> form_validation -> run() == TRUE) {
			$user = $this -> input -> post('email');
			$password = sha1($this -> input -> post('senha'));

			//Verifica se esse email existe no cadastro
			$sqlEmail = array('table' => 'cliente', 'where' => array('email' => $user), 'limit' => array(1));

			$loginEmail = $this -> crud -> select($sqlEmail);

			if ($loginEmail -> num_rows() == 0) {

				set_msg('errologin', 'Essa conta não existe. Entre com um email diferente ou clique em <b>CRIAR CONTA</b>', 'default');
				redirect(base_url('dashboard/login'));

			} else {

				//Salva o email numa sessão
				$this -> session -> set_userdata('log_email', $this -> input -> post('email'));

				$this -> form_validation -> set_rules('senha', 'senha', 'required|trim');

				if ($this -> form_validation -> run() == TRUE) {

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
							$sessao = array('user_logado' => true, 'user_nome' => $login -> nome, 'user_email' => $login -> email, 'user_idplano' => $login -> id_plano, 'user_fone' => $login -> fone, 'user_ip' => $user -> ip);
							$this -> session -> set_userdata($sessao);

							//Direciona usuário para main do dashboard
							redirect(base_url('dashboard/main'));
						else :
							$this -> session -> unset_userdata('log_email');
							set_msg('errologin', 'Seu acesso foi desautorizado! Por favor entrar em contato através do contato no site', 'danger');
							redirect(base_url('dashboard'));

						endif;

					} else {
						//
						set_msg('errologin', 'Senha ou email incorretos. Clique em <b>Recuperar senha</b>', 'danger');
						redirect(base_url('dashboard'));
					}
					//Validação login - fim
				} else {

					set_msg('errologin', 'Por favor digite sua senha', 'default');
					redirect(base_url('dashboard'));

				}
			}

		} else {

			set_msg('errologin', 'Não foi possível fazer o login', 'default');
			redirect(base_url('dashboard'));
		}

	}

	public function criar_conta() {

		$this -> form_validation -> set_rules('nome', 'nome', 'required|trim');
		$this -> form_validation -> set_rules('email', 'email', 'required|trim|valid_email');
		$this -> form_validation -> set_rules('ddd', 'DDD', 'required|trim|');
		$this -> form_validation -> set_rules('fone', 'fone', 'required|trim|is_unique[cliente.fone]|');
		$this -> form_validation -> set_rules('senha', 'senha', 'required|trim|sha1');
		$this -> form_validation -> set_rules('confirma_senha', 'Confirmação de senha', 'required|trim|sha1');
		//$this->form_validation->set_rules('id_plano','id_plano','required|trim');

		if ($this -> form_validation -> run() == FALSE) {

			$dados = elements(array('nome', 'email', 'senha'), $this -> input -> post());

			$dados['fone'] = $this -> input -> post('ddd') . $this -> input -> post('fone');
			$dados['status'] = 'c';
			$dados['id_plano'] = 1;

			$retorno = $this -> crud -> insert('cliente', $dados);
			redirect(base_url('dashboard/autenticacao/'));

		}
		//Carrega o conteudo da view
		set_tema('footerinc', load_js(array('site/js/load_pages', 'dash/assets/js/validator.aux')), FALSE);
		set_tema('conteudo', load_modulo_dash('view_dash_criar_conta'), FALSE);
		load_template();

	}

	public function recupera_senha($value = '') {

		//Carrego a biblioteca de email do CI
		$this -> load -> library('email');
		
		 $config = Array( 
  'protocol' => 'smtp', 
  'smtp_host' => 'ssl://smtp.googlemail.com', 
  'smtp_port' => 465, 
  'smtp_user' => 'auxsdcreative@gmail.com', 
  'smtp_pass' => '15xcr21t3v2', );

	$this->email->initialize($config);
		//Validação dos dados
		$this -> form_validation -> set_rules('email', 'Email', 'required|valid_email');

		//validacao email
		if ($this -> form_validation -> run()) {

			$user = $this -> input -> post('email');

			//Verifica se esse email existe no cadastro
			$sqlEmail = array('table' => 'cliente', 'where' => array('email' => $user), 'limit' => array(1));

			$loginEmail = $this -> crud -> select($sqlEmail);

			if ($loginEmail -> num_rows() == 0) {

				set_msg('recover', 'Essa conta não existe. Por favor, entre com o email correto para <b>RECUPERAÇÃO DO SEU ACESSO</b>', 'default');
				redirect(base_url('dashboard/autenticacao/recupera_senha'));

			} else {
				
				/*Evia email
					
				$this -> email -> from('opiniaopop@opniaopop.com.br', 'Suporte Opiniãopop');
				$this -> email -> to($this->input->post('email'));
				//$this -> email -> cc('another@another-example.com');
				//$this -> email -> bcc('them@their-example.com');

				$this -> email -> subject('Opiniãopop SUPORTE');
				$this -> email -> message('Acesso este link e crie uma nova senha de acesso');

				$this -> email -> send();
				*/
				set_msg('recover', 'Entre no seu email para recuperação do seu acesso no Opniãopop', 'info');
				redirect(base_url('dashboard/autenticacao/recupera_senha'));

			}

		}

		//Carrega o conteudo da view
		set_tema('footerinc', load_js(array('site/js/load_pages', 'dash/assets/js/validator.aux')), FALSE);
		set_tema('conteudo', load_modulo_dash('view_dash_recuperasenha'), TRUE);
		load_template();

	}

}
