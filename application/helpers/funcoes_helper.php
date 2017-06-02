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
	'site/vendor/font-awesome/css/font-awesome.min', 
	'site/vendor/magnific-popup/magnific-popup',
	'site/vendor/bootstrap/css/bootstrap.min', 
	'site/css/app')), FALSE);
	
	set_tema('footerinc', load_js(array(
	
	'site/vendor/jquery/jquery.min',
										'dash/validator/dist/validator.min',
										'dash/validator/js/validator', 
	'site/vendor/tether/tether.min', 
	'site/vendor/jquery-easing/jquery.easing.min', 
	'site/vendor/scrollreveal/scrollreveal.min', 
	'site/vendor/magnific-popup/jquery.magnific-popup.min', 
	'site/js/creative.min',
	'dash/mask/dist/min/jquery.inputmask.bundle.min',
	'site/vendor/bootstrap/js/bootstrap.min')), FALSE);
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
						'dash/assets/css/theme/red','site/css/app')), FALSE);
	
	set_tema('footerinc', load_js(array('dash/assets/js/jquery',
										'dash/validator/dist/validator.min',
										'dash/validator/js/validator',
										'dash/assets/js/vendor',
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
					echo  "<li>".anchor(base_url($caminho), strtr(ucfirst($urlString[$i]),array('_'=>' ','-'=>' ')))."</li>";
				else:
					echo  "<li class='active'>".strtr(ucfirst($urlString[$i]),array('_'=>' ','-'=>' '))."</li>";
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

	if (validation_errors())
		echo form_error($name, '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', 
 '</div>');

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
			redirect(base_url('dashboard/autenticacao/'));
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
	
	$AUX = & get_instance();

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


  function encode_aux($dado)
{
    $AUX =& get_instance();	  
	
	$AUX->load->library('encryption');
	  
    $ret = $AUX->encryption->encrypt($dado);

        $ret = strtr(
                $ret,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );

    return $ret;
}
  function decode_aux($chave)
{
       $AUX =& get_instance();
	   
	   $AUX->load->library('encryption');
    
    	$chave = strtr(
            
            $chave,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );

    return $AUX->encryption->decrypt($chave);
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

  function msgEmail($nome, $token){
  	return '<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opiniãopop - Recuperação de Senha</title>
        <style media="all" type="text/css">
 @media screen and (max-width: 600px) {
table[class="container"] {
width: 95% !important;
}
}
#outlook a {padding:0;}
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
.ExternalClass {width:100%;}
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
a img {border:none;}
.image_fix {display:block;}
p {margin: 1em 0;}
h1, h2, h3, h4, h5, h6 {color: black !important;}

h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
color: red !important;
}

h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
color: purple !important;
}

table td {border-collapse: collapse;}

table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

a {color: #000;}

@media only screen and (max-device-width: 480px) {

a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: black; /* or whatever your want */
pointer-events: none;
cursor: default;
}

.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: orange !important; /* or whatever your want */
pointer-events: auto;
cursor: default;
}
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: blue; /* or whatever your want */
pointer-events: none;
cursor: default;
}

.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: orange !important;
pointer-events: auto;
cursor: default;
}
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
/* Put your iPhone 4g styles in here */
}

@media only screen and (-webkit-device-pixel-ratio:.75){
/* Put CSS for low density (ldpi) Android layouts in here */
}
@media only screen and (-webkit-device-pixel-ratio:1){
/* Put CSS for medium density (mdpi) Android layouts in here */
}
@media only screen and (-webkit-device-pixel-ratio:1.5){
/* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
h2{
color:#181818;
font-family:Helvetica, Arial, sans-serif;
font-size:22px;
line-height: 22px;
font-weight: normal;
}
a.link1{

}
a.link2{
color:#fff;
text-decoration:none;
font-family:Helvetica, Arial, sans-serif;
font-size:16px;
color:#fff;border-radius:4px;
}
p{
color:#555;
font-family:Helvetica, Arial, sans-serif;
font-size:16px;
line-height:160%;
}       	
        </style>
</head>
<body>
	<body>
		<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
		<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class="bgBody">
			<tr>
				<td>
				<table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
					<tr>
						<td><!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
							<tr>
								<td class="movableContentContainer bgItem">
								<div class="movableContent">
									<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
										<tr height="40">
											<td width="200">&nbsp;</td>
											<td width="200">&nbsp;</td>
											<td width="200">&nbsp;</td>
										</tr>
										<tr>
											<td width="200" valign="top">&nbsp;</td>
											<td width="200" valign="top" align="center">
											<div class="contentEditableContainer contentImageEditable">
												<div class="contentEditable" align="center" >
													<img src="http://opiniaopop.com.br/site/img/logo/email.png" width="155" height="155"  alt="Logo"  data-default="placeholder" />
												</div>
											</div></td>
											<td width="200" valign="top">&nbsp;</td>
										</tr>
										<tr height="25">
											<td width="200">&nbsp;</td>
											<td width="200">&nbsp;</td>
											<td width="200">&nbsp;</td>
										</tr>
									</table>
								</div>
								<div class="movableContent">
									<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
										<tr>
											<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
											<div class="contentEditableContainer contentTextEditable">
												<div class="contentEditable" align="center" >
													<h2 >Recuperação de Senha</h2>
												</div>
											</div></td>
										</tr>
										<tr>
											<td width="100">&nbsp;</td>
											<td width="400" align="center">
											<div class="contentEditableContainer contentTextEditable">
												<div class="contentEditable" align="left" >
													<p >
														Oi, '.$nome.' ,
														<br/>
														<br/>
														Acesse seu email com a nova senha abaixo. Assim qe possível altere sua senha para uma mais familiar.
														<br />
													</p>
												</div>
											</div></td>
											<td width="100">&nbsp;</td>
										</tr>
									</table>
									<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
										<tr>
											<td width="200">&nbsp;</td>
											<td width="200" align="center" style="padding-top:25px;">
											<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
												<tr>
													<td bgcolor="#ED006F" align="center" style="border-radius:4px;" width="200" height="50">
													<div class="contentEditableContainer contentTextEditable">
														<div class="contentEditable" align="center">
															<a target="_blank" href="'.base_url("dashboard/autenticacao/alterar_senha_de_usuario/").$token.'" class="link2">Mudar Senha</a>
														</div>
													</div></td>
												</tr>
											</table></td>
											<td width="200">&nbsp;</td>
										</tr>
									</table>
								</div>
								<div class="movableContent">
									<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
										<tr>
											<td width="100%" colspan="2" style="padding-top:65px;">
											<hr style="height:1px;border:none;color:#333;background-color:#ddd;" />
											</td>
										</tr>
										<tr>
											<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
											<div class="contentEditableContainer contentTextEditable">
												<div class="contentEditable" align="left" >
													<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Opiniãopop &copy; 2017 </span>
													<br/>
													<span style="font-size:11px;color:#555;font-family:Helvetica, Arial, sans-serif;line-height:200%;">contato@opiniaopop.com.br | 98 999883372</span>
													<br/>
													<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;"> <a target="_blank" href="[FORWARD]" style="text-decoration:none;color:#555">Não encaminhe ou responda este email</a> </span>
													<br/>
													<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;"> <a target="_blank" href="[UNSUBSCRIBE]" style="text-decoration:none;color:#555">Não responda este email</a></span>
												</div>
											</div></td>
											<td width="40%" height="70" align="right" valign="top" align="right" style="padding-bottom:20px;"><!--<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
											<tr>
											<td width="57%"></td>
											<td valign="top" width="34">
											<div class="contentEditableContainer contentFacebookEditable" style="display:inline;">
											<div class="contentEditable" >
											<img src="images/facebook.png" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="facebook" style="margin-right:40x;">
											</div>
											</div>
											</td>
											<td valign="top" width="34">
											<div class="contentEditableContainer contentTwitterEditable" style="display:inline;">
											<div class="contentEditable" >
											<img src="images/twitter.png" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="twitter" style="margin-right:40x;">
											</div>
											</div>
											</td>
											<td valign="top" width="34">
											<div class="contentEditableContainer contentImageEditable" style="display:inline;">
											<div class="contentEditable" >
											<a target="_blank" href="#" data-default="placeholder"  style="text-decoration:none;">
											<img src="images/pinterest.png" width="30" height="30" data-max-width="30" alt="pinterest" style="margin-right:40x;" />
											</a>
											</div>
											</div>
											</td>
											</tr>
											</table>--></td>
										</tr>
									</table>
								</div></td>
							</tr>
						</table></td>
					</tr>
				</table></td>
			</tr>
		</table>
</body>
</html>';
  }
