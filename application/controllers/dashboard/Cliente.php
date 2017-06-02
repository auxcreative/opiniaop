<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cliente extends CI_Controller {

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
	public function index() {

		//esta_logado();
		
		$this -> gerenciar();
	
		
	}
		
	//Carrega os graficos e relatorios html
	
	public function relatorio($enquete=''){
		
		//esta_logado();
		
		if($enquete == ''){
			
			set_msg('msgerro','Por favor, esocolha uma enquete para gerar o seu relatório','info');
			redirect(base_url('dashboard/enquete'));
			
		} else {
			
			
		set_tema('conteudo', load_modulo_dash('view_dash_enquete_gerente'), FALSE);
		set_tema('headerinc', '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>', FALSE);
		set_tema('headerinc', load_js(array('dash/assets/js/scriptcharts')), FALSE);
		load_template();
		}

			
	} 

	public function json($id=0){
		
		//esta_logado();
		
		$select = array('select',
				'table'=>'votacao',
				'where'=>array('id'=>1)
		);
		
		$retorno = $this->crud->select($select)->result();
		
		
		
		echo json_encode($retorno);
		
		
		
		
		
		
	}

	//Faz o gerenciamento dos clientes 
	public function gerenciar(){
		
		//esta_logado();
		
		$rel = array('select'=> 'votacao.*, 
								cliente.*, 
								enquete.*,
								questionario.*',
					 			'table'=>'votacao, enquete, questionario',
								'join'=>array('cliente'=> array('cliente.id=votacao.id_cliente')));
							
		print_r($rel['join'])	;
			
		$dados = $this -> crud -> select($rel) -> result();
		
		
		$this -> load -> library('fpdf/fpdf');
		
		
		$PDF = new fpdf('P', 'mm' , 'A4');
		
		
		foreach ($dados as $relatorios) : 
		$border = 0;
		$ln = 1;		
		$localizacao = 'c';
		

			$PDF-> AddPage();
		$PDF->SetFont('Arial','B',16);
		$PDF->Image(base_url('site/img/logo/opiniaopop-black.png'),10,6,30);
		$PDF->Cell(50, 10, $relatorios -> id, $border, $ln , $localizacao);
		$PDF->Cell(50, 10, $relatorios -> status, $border, $ln , $localizacao);
		$PDF->Cell(50, 10,$relatorios -> nome, $border, $ln , $localizacao);
		$PDF->Cell(50, 10,  utf8_decode($relatorios -> titulo) , $border, $ln , $localizacao);
		$PDF->Cell(50, 10, utf8_decode($relatorios -> texto) , $border, $ln , $localizacao);	
		
			
		endforeach; 
		
		
		$PDF->Output('Relatorio de Clientes ' . $relatorios -> nome. '.pdf','I');
		 
		 
		 
		//set_tema('conteudo', load_modulo_dash('view_dash_gerarrelatorios',($PDF)));
		load_template();
		 
		 
		 
	}



	//função para editar

	public function editar() {
		//Validação
		$this -> form_validation -> set_rules('name', 'name', 'required|trim');

		//Dados validados faz o cadastro
		if ($this -> form_validation -> run()) {

			$dados = elements(array('p#nomevotante'), $this -> input -> post());

		} else {

		}

	}

	//função para deletar

	public function deletar($id = null) {

		//Dados validados faz o cadastro
		if ($id != null) {

			$dados = elements(array('p#nomevotante', 'p#fone', 'p#cidade_uf', 'p#senha', 'p#email'), $this -> input -> post());

		} else {

		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/.php */
