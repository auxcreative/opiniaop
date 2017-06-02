<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	/** Modelo - Persistência de dados princial
	* ELESBÃO PINTO MAGALHÃES FILHO - 2017
	 * AUX CREATIVE
	*/

class Crud_model extends CI_Model{

        public function __construct(){
        parent::__construct();
       
	}

	public function select($qry = array()){

		/* ***********************************************
		 * query
		 * 0 - DISTINCT
		 * 1 - SELECT, MAX SELECT, MIN SELECT, AVG, SUM
		 * ***********************************************
		 */						
			
		//instrução DISTINCT tem que recerber -> TRUE
		
		if(isset($qry['distinct']) && $qry['distinct'] === true ):						
			$this->db->distinct();						
		endif;
							
			
		//Faz o SELECT da query
			
		if(isset($qry['select'])):						
			$this->db->select($qry['select']);
		else:
			$this->db->select('*');							
		endif;

		//instrução SELECT MAX da query
			
		if(isset($qry['select_max'])):						
			$this->db->select_max($qry['select_max']);					
		endif;

		//instrução SELECT MIN da query
			
		if(isset($qry['select_min'])):						
			$this->db->select_min($qry['select_min']);						
		endif;				
		
		//instrução SELECT AVG da query
			
		if(isset($qry['select_avg'])):						
			$this->db->select_avg($qry['select_avg']);					
		endif;

		//instrução SELECT SUM da query
			
		if(isset($qry['select_sum'])):						
			$this->db->select_sum($qry['select_sum']);						
		endif;	
		

		/* *******************************************
		 * query
		   0 - FROM
		 * *******************************************
		 */				
		if(!isset($qry['query'])):				
		$this->db->from($qry['table']);
		endif;
		
		/* *******************************************
		 * query 
		 * 0 - WHERE, WHERE IN, WHERE NOT IN  
		 * 1 - LIKE, NOT LIKE  
		 * 2 - INNER JOIN
		 * ********************************************
		 */
		
		//instrução WHERE -> where array(a=>0,b=>1,c=>2)
		
        if (isset($qry['where'])):        	
            $this->db->where($qry['where']);
        endif;	
		
		//instrução WHERE IN -> where_in array(linha=>array(0,1,2))
		
		if (isset( $qry['where_in'] )):						
            $this->db->where_in($qry['where_in'][0], $qry['where_in'][1]);
			
        endif;			
		
		//instrução WHERE NOT IN -> where_not_in array( linha=> array(0,1,2) )
		
		if (isset( $qry['where_not_in'] )):	
								
            $this->db->where_not_in($qry['where_not_in'][0], $qry['where_not_in'][1]);
			
        endif;		
	
		//instrução LIKE->  array(linha=>array(0,1))
		
		if (isset( $qry['like'] )):	
					
			//Atribui um escape. %before, after%, (%both% -> caso tambem venha vazio)	
			
			$escape = (isset($qry['like'][1][1])) ? $qry['like'][1][1] : '';
			
            $this->db->like($qry['like'][0], $qry['like'][1][0], $escape);
			
        endif;			


		//instrução NOT LIKE->  array(linha=>array(0,1))
		
		if (isset( $qry['not_like'] )):	
					
			//Atribui um escape. %before, after%, (%both% -> caso tambem venha vazio)	
			
			$escape = (isset($qry['not_like'][1][1])) ? $qry['not_like'][1][1] : '';
			
            $this->db->like($qry['not_like'][0], $qry['not_like'][1][0], $escape);
			
        endif;

		
		//instrução JOIN ->  array(linha=>array(table,join))
		
		if (isset( $qry['join'] )):	
			
            $this->db->join($qry['join'][0], $qry['join'][1]);
			
        endif;	

		/* *******************************************
		 * query
		 * 0 - LIMIT
		 * 1 - ORDER BY
		 * *******************************************
		 */
		
		//instrução LIMIT ->  array(linha=>array(limit,offset))
		
		if (isset( $qry['limit'] )):
			
			//Atribui offset. caso não venha vazio)	
			
			$offset = (isset($qry['limit'][1])) ? $qry['limit'][1] : '';			
            $this->db->limit($qry['limit'][0], $offset);
			
        endif;			

		//instrução ORDER BY ->  array(a,b)
		
		if (isset( $qry['order_by'] )):
			
			//Atribui a order. caso não venha vazio	
			
			$order = (isset($qry['order_by'][1])) ? $qry['order_by'][1] : '';			
            $this->db->limit($qry['order_by'][0], $order);
			
        endif;				

		/* *******************************************
		 * query
		 * 0 - QUERY 
		 * *******************************************
		 */		
		 
		if (isset( $qry['query'] )):
			
			//Atribui a order. caso não venha vazio	
			
			return $this->db->query($qry['query'] );
			
        endif;			 
		 
		/* *******************************************
		 * query de finalização das instruções
		 * 0 - GET 
		 * *******************************************
		 */					
		return $this->db->get();							
    }

	public function insert($table='', $dados, $id_retoro = false) {
	
	if(!empty($table) && isset($dados)){
			
    $this->db->insert($table, $dados);
    	
	// retorna o id a inserção
       if ($this->db->affected_rows() === 0) {
       	           
		   set_msg('msgerrodb',$this->db->error(),'danger');
		   return FALSE;		   
		    
        }else {
        	
			if($id_retoro){        	        				
				//Cria sessão com ultimo id
				$this->session->set_userdata('insert_id', $this->db->insert_id());
				set_msg('msginsert','Sua operação de cadastro foi realizada com sucesso','success');
				return TRUE;	
			} else {
				set_msg('msginsert','Sua operação de cadastro foi realizada com sucesso','success');
				return TRUE;
			}
        }  
	} else {		
		return FALSE;
	} 
    }
	
	
	
	public function count_rows($table, $all, $pm_a, $v_a, $pm_b, $v_b){
		
		if($all == true){
			$query = $this->db->query("SELECT * FROM $table");	
			return $query->num_rows();
		} else {
			$query = $this->db->query("SELECT * FROM $table WHERE $pm_a = '$v_a' AND $pm_b = '$v_b'");
			return $query->num_rows();
		}	
	
	}
	
	public function delete($table, $id_name, $array){
        if ($id_name != "")
        {
            $this->db->where($id_name, $array[$id_name]);
        }
        $this->db->delete($table);
        if ($this->db->error())
        {
           return $this->db->error(); 
        }
        else
        {
            return true;
        }
    }
	
	public function update($table, $parametro = "", $dados) {
		
		
		if(is_array($parametro)){
							
			$this->db->update($table, $dados, $parametro);
			
			if($this->db->affected_rows() > 0){				
			//Salva os dados e escreve uma mensagem				
			set_msg('msgok','Alteração realizada com sucesso','success');
			return true;			
			}		
				
        } else {
        	
			set_msg('msgerro','Sua alteração não poder ser realizada! Por favor tente novamente.','danger');
			return false;
			redirect('dashboard/home');
    }
    
	
}
}
