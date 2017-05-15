<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema {
	
    protected $AUX;
    public $tema = array();
    
    public function __construct(){
        $this->AUX=& get_instance();
        $this->AUX->load->helper('funcoes');
    }
    
}

/* End of file sistema.php */
/* Location: ./application/libraries/sistema.php */