<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

Class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		init_login();
	}

	public function index() {
		/*
		$mesaDiretora = array(
                "distinct" => null,
	            "select" => "*",
	            "table" => "plano",
	            "where" => "",
	            "where_not_in"=>null,
	            "order_by" => "",
	            "like" => "",
	            "limit" => "",
	            "group_by" => "",
	            "join" => ""
        	);
			
		$dados['mesa'] = getItem($mesaDiretora)->row();
		*/
		

		if (!empty($this->session -> userdata('user_logado'))) redirect(base_url('dashboard/principal'));
		
		set_tema('conteudo', load_modulo_dash('view_dash_login'), FALSE);
		load_template();
		
	}

}
