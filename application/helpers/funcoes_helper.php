<?php defined('BASEPATH') OR exit('No direct script access allowed');

//carrega um modulo do sistema a tela solicitada painel
function load_modulo_dash($modulo = NULL, $tela = NULL, $diretorio = 'dashboard') {
	$AUX = &get_instance();
	if ($modulo != NULL) :
		return $AUX -> load -> view("$diretorio/$modulo", $tela, TRUE);
	else :
		return FALSE;
	endif;
}

//carrega um modulo do sistema a tela solicitada painel
function load_modulo_site($modulo = NULL, $tela = NULL, $diretorio = 'site') {
	$AUX = &get_instance();
	if ($modulo != NULL) :

		return $AUX -> load -> view("$diretorio/$modulo", $tela, TRUE);
	else :
		return FALSE;
	endif;
}

//seta valores do array tema
function set_tema($prop, $valor, $replace = TRUE) {
	$AUX = &get_instance();
	$AUX -> load -> library('sistema');

	if ($replace) :

		$AUX -> sistema -> tema[$prop] = $valor;
	else :
		if (!isset($AUX -> sistema -> tema[$prop]))
			$AUX -> sistema -> tema[$prop] = '';
		$AUX -> sistema -> tema[$prop] .= $valor;
	endif;
}

//retorna os valores do array Tema da classe sistema
function get_tema() {

	$AUX = &get_instance();
	$AUX -> load -> library('sistema');
	return $AUX -> sistema -> tema;
}

//Inicializa o painel adm carregando os recursos necessários

function init_login() {

	$AUX = &get_instance();
	$AUX -> load -> library(array('sistema', 'session', 'form_validation', 'parser', 'upload'));
	$AUX -> load -> helper(array('form', 'url', 'array', 'text', 'html', 'date', 'string', 'download'));

	$AUX -> load -> model('Crud_model', 'crud');

	set_tema('titulo', 'Opinião Pop');
	set_tema('rodape', '<p class="rodape">Opinião Pop; 2017</p>');
	set_tema('template', 'template_login');
	
	set_tema('headerinc', load_css(array('site/css/creative.min', 
	'site/vendor/bootstrap/css/bootstrap.min', 
	'site/vendor/font-awesome/css/font-awesome.min', 
	'site/vendor/magnific-popup/magnific-popup', 
	'site/css/app')), FALSE);
	
	set_tema('footerinc', load_js(array('site/vendor/jquery/jquery.min', 
	'site/vendor/tether/tether.min', 
	'site/vendor/bootstrap/js/bootstrap.min', 
	'site/vendor/jquery-easing/jquery.easing.min', 
	'site/vendor/scrollreveal/scrollreveal.min', 
	'site/vendor/magnific-popup/jquery.magnific-popup.min', 
	'site/js/creative.min',
	'dash/mask/dist/min/jquery.inputmask.bundle.min')), FALSE);
}

function init_site() {

	$AUX = &get_instance();

	$AUX -> load -> library(array('sistema', 'session', 'form_validation', 'parser', 'upload'));
	$AUX -> load -> helper(array('form', 'url', 'array', 'text', 'html', 'date', 'string', 'download'));
	
	$AUX -> load -> model('Crud_model', 'crud');

	set_tema('titulo', 'Pesquisa de mercado, opinião e enquetes online');
	set_tema('rodape', '<p class="rodape">Opiniãopop &copy; 2017</p>');
	set_tema('template', 'template_site');
	set_tema('headerinc', load_css(array('site/css/creative.min', 'site/vendor/bootstrap/css/bootstrap.min', 'site/vendor/font-awesome/css/font-awesome.min', 'site/vendor/magnific-popup/magnific-popup', 'site/css/app','site/css/price.min')), FALSE);
	set_tema('footerinc', load_js(array('site/vendor/jquery/jquery.min', 'site/vendor/tether/tether.min', 'site/vendor/bootstrap/js/bootstrap.min', 'site/vendor/jquery-easing/jquery.easing.min', 'site/vendor/scrollreveal/scrollreveal.min', 'site/vendor/magnific-popup/jquery.magnific-popup.min', 'site/js/creative.min')), FALSE);
}

function init_dash() {
	$AUX = &get_instance();
	
	$AUX ->load->model('crud_model','crud');


	$AUX -> load -> library(array('sistema', 'session', 'form_validation', 'parser', 'upload'));
	$AUX -> load -> helper(array('form', 'url', 'array', 'text', 'html', 'string', 'download', 'date'));

	set_tema('titulo', 'Opiniãopop Painel de administracao');
	set_tema('rodape', '<p class="rodape">Opiniãopop &copy; 2017</p>');
	set_tema('template', 'template_dash');
	set_tema('headerinc', load_css(array(
						'dash/assets/css/vendor',
						'dash/assets/css/flat-admin',
						'dash/assets/css/theme/red')), FALSE);
	
	set_tema('footerinc', load_js(array('dash/assets/js/vendor',
										'dash/assets/js/app')), FALSE);	


}

//carrega um template passando uma array tem como parametro
function load_template() {
	$AUX = &get_instance();
	$AUX -> load -> library('sistema');
	$AUX -> parser -> parse($AUX -> sistema -> tema['template'], get_tema());

}

//gera os breadcrumb com base no controller tual
function breadcrumb() {
	
	$AUX = &get_instance();
	$AUX -> load -> helper('url');
	
	//Recebe a uri e converte em string, separa em array, conta os arrays contidos na string
	$string = $AUX->uri->uri_string();	
	$urlString = explode('/', $string);	
	$qtd =  count($urlString);
	
	//Parâmetros
	$i = 0;
	$caminho = '';
	
	echo '<ol class="breadcrumb">';
		//Do while
		do{
			//Escreve o caminho
			$caminho .= $urlString[$i].'/';	
				//Põe a classe active na última uri e escreve o breadCrumb
				if($urlString[$i] != end($urlString)):	
					echo  "<li>".anchor(base_url($caminho),$urlString[$i])."</li>";
				else:
					echo  "<li class='active'>".$urlString[$i]."</li>";
				endif;		
			$i++;	
		} while($i < $qtd);
	echo '</ol>';
	
}

//carrega os arquivos css

function load_css($arquivo = NULL, $media = 'all') {
	if ($arquivo != NULL) :
		$AUX = &get_instance();
		$AUX -> load -> helper('url');
		$retorno = '';
		if (is_array($arquivo)) :
			foreach ($arquivo as $css) :
				$retorno .= '<link rel="stylesheet" type="text/css" href="' . base_url("$css.css") . '" media="' . $media . '" />';
			endforeach;
		else :
			$retorno = '<link rel="stylesheet" type="text/css" href="' . base_url("$css.css") . '" media="' . $media . '" />';
		endif;
	endif;
	return $retorno;
}

//carrega um ou vários .js de uma pasta ou servidor
function load_js($arquivo = NULL, $remoto = FALSE) {
	if ($arquivo != NULL) :
		$AUX = &get_instance();
		$AUX -> load -> helper('url');
		$retorno = '';

		if (is_array($arquivo)) :

			foreach ($arquivo as $js) :

				if ($remoto) :
					$retorno .= '<script type="text/javascript" src="' . $js . '"></script>';
				else :
					$retorno .= '<script type="text/javascript" src="' . base_url("$js.js") . '"></script>';
				endif;
			endforeach;
		else :

			if ($remoto) :

				$retorno .= '<script type="text/javascript" src="' . $js . '"></script>';
			else :
				$retorno .= '<script type="text/javascript" src="' . base_url("$js.js") . '"></script>';
			endif;
		endif;
	endif;
	return $retorno;
}

//Mostra errosde validação
function erros_validacao($name = NULL) {

	$config['error_prefix'] = 'has-warning';
	$config['error_suffix'] = '';

	if (validation_errors())
		echo form_error($name, 'has-warning', '');

}

//Perfil
function acesso($local = '') {

	/* Parâmetros da tabela e acesso
	 * 1 - para sim
	 * 0 - para não	 *
	 * Sequência das posições
	 * cadastrar[0], editar[1], deletar[2], liberar[3]
	 */

	$AUX = &get_instance();
	$AUX -> load -> library('session');

	$perfil = $AUX -> session -> userdata('user_perfil');

	switch ($local) {

		case 'insert' :
			if (substr($perfil, 0, 1) != 1) :
				set_msg('msgacesso', '<span class="glyphicon glyphicon-alert"></span>
				 VOCÊ NÃO TEM ACESSO PARA CADASTRAR!
			POR FAVOR PEÇA QUE O ADMINISTRADOR DO SISTEMA DÊ CONTINUIDADE
			NESSE PROCESSO.', 'warning');
				redirect('main/home');
			endif;

			break;
		case 'edit' :
			if (substr($perfil, 1, 1) != 1) :
				set_msg('msgacesso', '<span class="glyphicon glyphicon-alert"></span><br />VOCÊ NÃO TEM ACESSO PARA EDITAR!
			POR FAVOR PEÇA QUE O ADMINISTRADOR DO SISTEMA DÊ CONTINUIDADE
			NESSE PROCESSO.', 'warning');
				redirect('main/home');
			endif;

			break;
		case 'del' :
			if (substr($perfil, 2, 1) != 1) :
				set_msg('msgacesso', '<span class="glyphicon glyphicon-alert"></span><br />VOCÊ NÃO TEM ACESSO PARA DELETAR!
			POR FAVOR PEÇA QUE O ADMINISTRADOR DO SISTEMA DÊ CONTINUIDADE
			NESSE PROCESSO.', 'warning');
				redirect('main/home');
			endif;
			break;
		case 'control' :
			if (substr($perfil, 3, 1) != 1) :
				set_msg('msgacesso', '<span class="glyphicon glyphicon-alert"></span><br />VOCÊ NÃO TEM ACESSO PARA LIBERAÇÃO!
			POR FAVOR PEÇA QUE O ADMINISTRADOR DO SISTEMA DÊ CONTINUIDADE
			NESSE PROCESSO.', 'warning');
				redirect('main/home');
			endif;
			break;

		default :
			set_msg('msgacesso', 'VOCÊ NÃO TEM ACESSO A NENHUM MODULO AINDA!
			POR FAVOR PEÇA QUE O ADMINISTRADOR DO SISTEMA REALIZE LHE DÊ AUTORIZAÇÃO AO SISTEMA.', 'warning');
			$AUX -> sesion -> sess_dretroy();
			redirect('main/login');
			break;
	}

}

//Verificar se usuário está logado no sistema
function esta_logado($redir = TRUE) {
	$AUX = &get_instance();
	$AUX -> load -> library('session');
	$status = $AUX -> session -> userdata('user_logado');

	if (!isset($status) || $status != TRUE) :
		if ($redir) :
			set_msg('notificacao', '<b>Faça seu login</b>', 'info');
			redirect(base_url('dashboard/login'));
		else :
			return FALSE;
		endif;
	else :
		return TRUE;
	endif;
}

//seta um registro para auditoria
function auditoria($operacao, $obs, $query = TRUE) {
	$AUX = &get_instance();
	$AUX -> load -> library('session');
	$AUX -> load -> model('usuarios_model', 'usuarios');
	$AUX -> load -> model('auditoria_model', 'auditoria');

	if (esta_logado(FALSE)) :
		$user_id = $AUX -> session -> userdata('user_id');
		$user_login = $AUX -> usuarios -> get_byid($user_id) -> row() -> login;
	else :
		$user_login = 'Desconhecido';
	endif;
	if ($query) :
		$last_query = $AUX -> db -> last_query();
	else :
		$last_query = '';
	endif;

	$dados = array('usuario' => $user_login, 'operacao' => $operacao, 'query' => $last_query, 'obs' => $obs);
	$AUX -> auditoria -> do_insert($dados);
}

//Define mensagem das telas
function set_msg($id = 'notificacao', $msg = NULL, $tipo = '') {
	$AUX = &get_instance();

	$AUX -> session -> set_flashdata($id, '<div class="alert alert-' . $tipo . ' alert-dismissible" role="alert">' . '<button type="button" class="close" data-dismiss="alert" arial-label="Close"><span arial-hidden="true">&times;
	<span></button>' . $msg . '</div>');

}

//verifica se existe uma mensagem para ser exibida na tela
function get_msg($id, $printar = TRUE) {
	$AUX = &get_instance();
	if ($AUX -> session -> flashdata($id)) :
		if ($printar) :
			echo $AUX -> session -> flashdata($id);
			return TRUE;
		else :
			return $AUX -> session -> flashdata($id);
		endif;
	endif;
	return FALSE;
}

function getNotificacao() {

	$AUX = &get_instance();

	if (count($AUX -> session -> flashdata()) != 0) {
		return $AUX -> session -> flashdata('notificacao');
	} else {
		return false;
	}

}

//Retorna a validação de erro do foundation.abide
function load_small($nome = NULL, $id = '') {

	if ($nome != '') :
		echo form_error($nome, '<span id="' . $id . '" class="help-block">', '</span>');
	else :
		return '<small class="error">Este campo deve ser preenchido</small>';
	endif;
}

//ajusta data para ser salva no banco de dados
function load_data($data = NULL) {
	if ($data != NULL) :
		$dia = substr($data, 0, 2);
		$mes = substr($data, 3, 2);
		$ano = substr($data, 6, 4);

		$retorno = $ano . "-" . $mes . "-" . $dia;
		return $retorno;
	else :
		return NULL;

	endif;
}

//Arruma a data para ser visualizada
function arruma_data($data = NULL) {
	if ($data != NULL) :
		$dia = substr($data, 8, 2);
		$mes = substr($data, 5, 2);
		$ano = substr($data, 0, 4);

		$retorno = $dia . "/" . $mes . "/" . $ano;
		return $retorno;
	else :
		return NULL;
	endif;
}

function arruma_hora($hora = NULL) {
	if ($hora != NULL) :
		//00:00
		//01 34
		$_hora = substr($hora, 0, 2);
		$_minuto = substr($hora, 3, 2);

		return $_hora . ':' . $_minuto;
	else :
		return NULL;
	endif;
}

function isActive($pagina = null, $parametro = null) {
	if ($pagina == $parametro) {
		return "active";
	} else {
		return null;
	}
}

function retirarAcentos($string = null) {
	if ($string != null) {

		$arrayString = str_split(utf8_decode($string));
		//Gera array apartir da string com utf8 decodificado
		//A decodificação é necessária para que o número posicoes criadas
		// seja igual ao numero de caracteres da string (na UTF-8)

		$tmp = array();
		foreach ($arrayString as $char) {
			$tmp[] = substituiCaractere(utf8_encode($char));
		}

		return implode($tmp);
	}
}

function substituiCaractere($char) {

	$strMap = array('á' => 'a', 'à' => 'a', 'ã' => 'a', 'ä' => 'a', 'Á' => 'a', 'À' => 'a', 'Ã' => 'a', 'Ä' => 'a', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'É' => 'e', 'È' => 'e', 'Ê' => 'e', 'ì' => 'i', 'í' => 'i', 'Ì' => 'i', 'Í' => 'i', 'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'Ó' => 'o', 'Ò' => 'o', 'Ô' => 'o', 'Õ' => 'o', 'Ö' => 'o', 'ú' => 'u', 'ù' => 'u', 'ũ' => 'u', 'ü' => 'u', 'Ú' => 'u', 'Ù' => 'u', 'Ũ' => 'u', 'Ü' => 'u', 'ç' => 'c', 'Ç' => 'c', 'ñ' => 'n', 'Ñ' => 'n', ' ' => '-', '?' => '', '%' => '-porcento', '@' => '', '[' => '', ']' => '', '!' => '', '(' => '', ')' => '');

	foreach ($strMap as $keyMap => $valueMap) {
		if ($char == $keyMap) {
			return $valueMap;
		}
	}
	return $char;
}

function codificarString($string) {

	$prfx = array('AFVxaIF', 'Vzc2ddS', 'ZEca3d1', 'aOdhlVq', 'QhdFmVJ', 'VTUaU5U', 'QRVMuiZ', 'lRZnhnU', 'Hi10dX1', 'GbT9nUV', 'TPnZGZz', 'ZGiZnZG', 'dodHJe5', 'dGcl0NT', 'Y0NeTZy', 'dGhnlNj', 'azc5lOD', 'BqbWedo', 'bFmR0Mz', 'Q1MFjNy', 'ZmFMkdm', 'dkaDIF1', 'hrMaTk3', 'aGVFsbG');

	for ($i = 0; $i < 3; $i++) {

		$string = $prfx[array_rand($prfx)] . strrev(base64_encode($string));
	}
	$string = strtr($string, "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2");
	return implode("", explode('=', $string));
}

function decodificarString($string) {
	$string = strtr($string, "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2", "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
	for ($i = 0; $i < 3; $i++) {
		$string = base64_decode(strrev(substr($string, 7)));
	}
	return $string;

}

//Função de inserir, editar
function setItem($cod = null, $tab = null, $post = null, $redir = null) {

	$AUX = &get_instance();
	$AUX -> load -> model('crud_model');
	$dados = array();

	//INSERT
	if ($cod == null) {//Verifica se é operacao de update ou insert

		foreach ($post as $key => $value) {//Povoa o array para persistencia
			$operando = explode('#', $key);
			if ($operando[0] == 'p') {
				$dados[$operando[1]] = $value;
			}
		}

		$result = $AUX -> crud_model -> insert($tab, $dados);
		//carrega prox view
		if (!is_array($result)) {
			//$result retorna  o ID do item inserido
			set_msg('notificacao', 'Registro inserido com sucesso', 'success');
			if ($redir != null)
				redirect($redir);
			//volta para gerenciamento de noticias
		} else {
			//array $result e carrega proxima view enviando erro para depuração

		}

	}
	//UPDATE
	else {

		//Para updates que usam outros parametros que não só o ID
		if (is_array($cod)) {

			foreach ($post as $key => $value) {//Povoa o array para persistencia

				$operando = explode('#', $key);
				if ($operando[0] == 'p') {
					$dados[$operando[1]] = $value;
				}
			}

			$result = $AUX -> crud_model -> update($tab, $cod, $dados);

		} else {

			$dados['id'] = decodificarString($cod);

			foreach ($post as $key => $value) {//Povoa o array para persistencia
				$operando = explode('#', $key);
				if ($operando[0] == 'p') {
					$dados[$operando[1]] = $value;
				}
			}

			$result = $AUX -> crud_model -> update($tab, "id", $dados);

		}
		//Faz o retorno e dá a mensagem da situação do cadastro
		if ($result) {
			if ($result['code'] == 0) {//Query executada com sucesso
				//Carrega proxima view
				set_msg('notificacao', 'Registro atualizado com sucesso', 'success');
				if ($redir != null)
					redirect($redir);
			} else {
				//Carrega proxima view enviando erro para depuração  (array $result)
				set_msg('notificacao', 'Erro ao atualizar registro', 'danger');
				if ($redir != null)
					redirect($redir);
			}
		}

	}
}


function paginacao($url, $tabela, $where = "", $num_page) {

	$AUX = &get_instance();

	$AUX -> load -> library('pagination');
	$AUX -> load -> model('crud_model');

	//Query com a consulta do numeros de linha da tabela
	$NumPaginacao = array("distinct" => null, "select" => "*", "table" => $tabela, "where" => $where, "where_not_in" => null, "order_by" => "", "like" => "", "limit" => "", "group_by" => "", "join" => "");

	//Busca no model a quantidade de linhas
	$linhas = getItem($NumPaginacao) -> num_rows();

	//onfigiração da paginação
	$config['base_url'] = $url;
	$config['total_rows'] = $linhas;
	$config['per_page'] = $num_page;

	//Tags de abertura da paginação
	$config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination">';
	$config['full_tag_close'] = '</ul></nav>';
	//Stilo da paginação
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';

	$AUX -> pagination -> initialize($config);

	return $AUX -> pagination -> create_links();
}
