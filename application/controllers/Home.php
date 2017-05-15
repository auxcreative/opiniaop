<?php if (!defined('BASEPATH'))	exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		init_site();
		//$this -> load -> model('produto_model', 'produto');

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {

		set_tema('conteudo', load_modulo_site('view_inicio'));		
		set_tema('footerinc', load_js(array('site/js/load_pages')), FALSE);
		load_template();
	}
	
	//função para cadastrar novo cliente
	
	public function novo_cadastro(){
		
		
		//Validação
		$this->form_validation->rules('email','Email','required|trim|is_unique["cliente.email"]');
		$this->form_validation->rules('senha','senha','required|trim');
		$this->form_validation->rules('nome','nome','required|trim');
		$this->form_validation->rules('fone','Fone','required|trim|is_unique["cliente.fone"]');
		
		//Dados validados faz o cadastro
		if($this->form_validation->run()){
			
			$dados = elements(array('p#nome','p#fone','p#cidade_uf','p#senha','p#email'), 
								
								$this->input->post());			
			
		} else {
			
			
		}
		
		
	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/Home.php */
