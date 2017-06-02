<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	$modulo = $this -> uri -> segment(3);
	$url =  ($this -> uri -> segment(4) == '') ? '' : '/'.$this -> uri -> segment(4);

 ?>
<div class="container-fluid">
	<div class="container autencicacao">
		<div id="login" class="row box <?php echo ($modulo == '' || $modulo == 'validacao') ? '' : 'display'; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-center text-white">Opiniãopop</h2>
				<hr class="light">
				<p class=" text-center">
				<a href="<?php echo base_url() ?>" class="text-white"  title="Ir para home do site"><i class="fa fa-home" aria-hidden="true"></i> Voltar</a>
				</p>
				<!-- BEGIN LOGIN -->

				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-4 col-sm-6 offset-lg-4 bg-white">			
							<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> Faça <small> seu login</small></h3>
							<br />

							<form action="<?php echo base_url('dashboard/autenticacao/validacao').$url ?>" method="post" class="form form-estilo" data-toggle="validator" role="form">
								<div class="form-group">									
									<input type="email" placeholder="digite seu email de acesso" name="email" value="<?php echo set_value('email',$this->session->userdata('log_email')) ?>" class="form-control" >
								</div>
								<?php  if($this->session->userdata('log_email')):
								?>
								<div class="form-group">
									<input type="password" placeholder="Senha:" name="senha" value="" class="form-control">
								</div>
								<?php  endif; ?>
								<div class="form-group text-right">
									<small class="btn-recover"><i class="fa fa-info" aria-hidden="true"></i> Recuperar senha</small>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="btn">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Acessar
									</button>
								</div>
							</form>
							<br />
							<p class="btn-addition"><i class="fa fa-asterisk" aria-hidden="true"></i> Não tenho conta</p>
							<div class="row">
								<div class="col-lg-12">
									<?php get_msg('login') . '<br />'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>

		<!-- BEGIN RECUPERAÇÃO DE SENHA -->
		<div id="recover" class="row box <?php echo ($modulo == 'recupera_senha') ? '' : 'display'; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-white text-center">Esqueci minha senha</h2>
				<hr class="light">
				<p class=" text-center">
				<a href="<?php echo base_url() ?>" class="text-white"  title="Ir para home do site"><i class="fa fa-home" aria-hidden="true"></i> Voltar</a>
				</p>
				<div class="row">
					<div class="col-md-12 borda-div">
						<div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-4 bg-white">
							<h3><i class="fa fa-envelope-open" aria-hidden="true"></i> Recupera<small>  senha</small></h3><br />
							<form action="<?php echo base_url('dashboard/autenticacao/recupera_senha/').$url; ?>" method="post" class="form form-estilo" data-toggle="validator" role="form">

								<div class="form-group">
									<input type="email" placeholder="email: digite seu email" class="form-control" name="email" value="" required="">
								</div>
								<div class="form-group text-right">
									<small class="btn-login"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Login</small>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="btn">
										Enviar
									</button>
								</div>

							</form>
							<div class="row">
								<div class="col-lg-12">
									<?php get_msg('recover').'<br />'
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- END RECUPERAÇÃO DE SENHA -->
		<!-- BEGIN CADASTRO -->
		<div id="addition" class="row box <?php echo ($modulo == 'criar_conta') ? '' : 'display'; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-white text-center">Faça seu Cadastro</h2>
				<hr class="light">
				<p class=" text-center">
				<a href="<?php echo base_url() ?>" class="text-white"  title="Ir para home do site"><i class="fa fa-home" aria-hidden="true"></i> Voltar</a>
				</p>
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-4 col-sm-12 offset-lg-4 bg-white">
							<h3><i class="fa fa-asterisk" aria-hidden="true"></i> Nova <small> conta</small></h3>
							
							<form action="<?php echo base_url('dashboard/autenticacao/criar_conta/').$url; ?>" method="post" class="form form-estilo" data-toggle="validator" role="form">
								<div class="form-group">

										<?php 
										foreach($plano as $planos): 
											$opt[$planos->id] = 'Plano - '.$planos->nome.'  - R$ '.$planos->valor;	
										endforeach;
										echo form_dropdown('id_plano',$opt, set_value('id_plano',decode_aux($this->uri->segment(4))),'class="form-control required"');
										?>
								</div>
								
								<div class="form-group">
									<input type="text" placeholder="Nome completo" data-minlength="5" class="form-control" name="nome" value="<?php echo set_value('nome','') ?>" required />
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3 col-md-4 col-xs-4">
											<input type="tel" placeholder="DDD" maxlength="2" class="form-control" name="ddd" value="<?php echo set_value('ddd','') ?>" required />
										</div>
										<div class="col-sm-9 col-md-8 col-xs-8">
											<input type="tel" placeholder="Celular" maxlength="9" class="form-control" name="fone" value="<?php echo set_value('fone','') ?>" required />
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo set_value('email','') ?>" required />
								</div>
								<div class="form-group">
									<input type="password" placeholder="Senha" class="form-control" name="senha" value="<?php echo set_value('senha','') ?>" id="password" required />
								</div>
								<div class="form-group">
									<input type="password" placeholder="Repetir senha" class="form-control" name="password" value="<?php echo set_value('password','') ?>" data-match="#password">
								</div>
								<div class="form-group text-right">
									<small class="btn-login"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Login</small>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="btn">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> CRIAR CONTA
									</button>
								</div>
							</form>

							<div class="row">
								<div class="col-lg-12">
									<?php get_msg('conta') . '<br />'; erros_validacao('fone'); erros_validacao('email'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- alterar senha -->
		<div class="row box <?php echo ($modulo == 'alterar_senha_de_usuario') ? '' : 'display'; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-white text-center">Nova Senha</h2>
				<hr class="light">
				<p class=" text-center">
				<a href="<?php echo base_url() ?>" class="text-white"  title="Ir para home do site"><i class="fa fa-home" aria-hidden="true"></i> Voltar</a>
				</p>
				<div class="row">
					<div class="col-md-12 borda-div">
						<div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-4 bg-white">
							<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php $nome = explode(' ', $usuario->nome); echo (count($nome) >= 2) ? current($nome).' '.end($nome) : current($nome); ?></h3>
							<br />
			<form action="<?php echo base_url('dashboard/autenticacao/alterar_senha_de_usuario/').$url; ?>" method="post" class="form form-estilo" data-toggle="validator" role="form">
      		<div class="form-group">    			
      			<input type="password" placeholder="Nova senha" value="" data-minlength="6" name="password" class="form-control" id="inputPassword"  />
      		</div>
      		   <div class="form-group">      			
      			<input type="password" placeholder="Repita a senha" value="" name="confirma_senha" class="form-control" id="confirma" data-match="#inputPassword" 
      			required  />
      		</div> 
      		
      										<div class="form-group text-right">
									<a href="<?php echo base_url('dashboard/autenticacao')  ?>"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="btn">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Salvar
									</button>
								</div>

							</form>
							<div class="row">
								<div class="col-lg-12">
									<?php get_msg('altera').'<br />'
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
     </div>
	</div>
</div>

