<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Enquete extends CI_Controller {

	public function __construct() {
		parent::__construct();
		init_dash();
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
	public function index($step='') {

		esta_logado();

		set_tema('conteudo', load_modulo_dash('view_dash_enquete_tutorial'));
		load_template();

	}


	public function inicio($step='') {

		esta_logado();

		set_tema('conteudo', load_modulo_dash('view_dash_enquete_tutorial'));
		load_template();

	}

	//função para cadastrar

	public function cadastro($val1='',$val2='',$val3='') {
		
		esta_logado();

		//Validação
		$this -> form_validation -> set_rules('nome', 'Nome do erro', 'required|trim|is_unique["tema.nome"]');

		//Dados validados faz o cadastro
		if ($this -> form_validation -> run()) {

			$dados = elements(array('p#nomeenquete'), $this -> input -> post());

		} else {
			
			
			set_msg('msgerro','Não foi possível cadastrar','danger');
			set_msg('msgok','O cadastro foi realizado','success');
			

		}

		//temas
		set_tema('conteudo', load_modulo_dash('view_enquete_cadastro'));
		load_template();

	}

	//função para editar

	public function editar() {
		
		esta_logado();
		
		//Validação
		$this -> form_validation -> set_rules('name', 'name', 'required|trim');

		//Dados validados faz o cadastro
		if ($this -> form_validation -> run()) {

			$dados = elements(array('p#nomeenquete'), $this -> input -> post());

		} else {

		}

	}

	//função para deletar

	public function deletar($id = null) {
		
		esta_logado();

		//Dados validados faz o cadastro
		if ($id != null) {

			$dados = elements(array('p#nomeenquete', 'p#fone', 'p#cidade_uf', 'p#senha', 'p#email'), $this -> input -> post());

		} else {

		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/.php */
