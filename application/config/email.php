<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
| -------------------------------------------------------------------------
| Email configuracao
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	
|
*/
				

				$config = Array( 
  				'protocol' => 'sendemail', 
  				'smtp_host' => 'a2plcpnl0632.prod.iad2.secureserver.net', 
  				'smtp_port' => 465, 
  				'smtp_user' => 'contato@opiniaopop.com.br', 
  				'smtp_pass' => 'contato4pnp4p',
  				'smtp_timeout' => '4',
            	'mailtype'  => 'html', 
            	'charset'   => 'utf-8',
				'wordwrap' =>TRUE);
				
				
