<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
	

    public function __construct(){
        parent::__construct();
        init_dash();
		
		
				
    }    
	/**
	 * X-On
	 * Sistema: Portal da Transparencia - Coelho Neto
	 * Controlador: usuario
	 */
	public function index()	{
		
		redirect(base_url('dashboard/usuario/conta'));
	
	}
	
	public function conta() {
		
	esta_logado();
	
	//Id do usuário logado
	$id_user = $this->session->userdata('user_id');
	
	//Faz a chamada do usuário no banco de dados
	$qryUser = array('select'=>'cliente.*,plano.id as plano_id, plano.nome as plano_nome',
					 'table'=>'cliente',
					 'where'=>array('cliente.id' => $id_user),
					 'join'=>array('plano','plano.id=cliente.id_plano'));
					 	
	$dados['usuario'] = $this->crud->select($qryUser)->row(); 
				
				
	$this->form_validation->set_rules('nome','Nome','required');
	$this->form_validation->set_rules('id_plano','Plano','required');
	$this->form_validation->set_rules('email','Email','required');
	$this->form_validation->set_rules('fone','Celular','required|numeric');
	$this->form_validation->set_rules('ddd','DDD','required|numeric');
	
	if($this->form_validation->run()):
		
		$dados = elements(array('nome','id_plano','email','fone','status','ddd'), 
		$this->input->post());
		
		$update = $this->crud->update('cliente',array('id'=>$id_user),$dados);
		
		redirect('dashboard/usuario/conta');
	
	endif;
	
	set_tema('conteudo', load_modulo_dash('view_dash_usuario_conta', $dados), FALSE);
    load_template();
    
    
      
  }
	
	public function alterar_senha(){
		
		esta_logado();
		
		
		//Id do usuário logado
		$id_user = $this->session->userdata('user_id');
		
		$this->form_validation->set_rules('password','Senha','required');
		//Validacao
		if($this->form_validation->run()){
			
		$confirma = array('select',
						   'table'=>'cliente',
						   'where'=>array('id'=>$id_user,'senha'=>sha1($this->input->post('senha')))
						   );
						   
		$user = $this->crud->select($confirma);
		
		
		if($user->num_rows() > 0):		
				
			$this->crud->update('cliente', array('id'=>$id_user, 'senha'=>sha1($this->input->post('senha'))), 
										  array('senha'=> sha1($this->input->post('password'))));
							
			redirect('dashboard/usuario/conta');
		
		else:
			
			set_msg('msgerro','Senha não confere. Por favor entre com a senha correta!','info');
			redirect('dashboard/usuario/conta');			
		
		endif;
			
		} else {
			
			set_msg('msgerro','Não foi possível alterar sua senha. Por favor tente novamente!','danger');
			redirect('dashboard/usuario/conta');
			
		}
		
		
		
	
	}
	
}