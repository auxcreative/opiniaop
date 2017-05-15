<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="container autencicacao">
		<div class="row box login">
			<div class="col-lg-12">
				<h2 class="section-heading text-center text-white">Faça seu Login</h2>
				<hr class="light">
				<!-- BEGIN LOGIN -->

				<div class="row">
					<div class="col-lg-12">
						
						<div class="col-lg-4 col-sm-6 offset-lg-4 bg-white">
							<h5>Opiniãopop <br /><small>Acesse sua conta</small></h5>
							
							<form action="<?php echo base_url('dashboard/autenticacao/validacao');  ?>" method="post" class="form form-estilo">
								<div class="form-group">
									<input type="text" placeholder="Digite seu email de acesso" name="email" value="<?php echo set_value('email',$this->session->userdata('log_email')) ?>" class="form-control" >
								</div>
								<?php  if($this->session->userdata('log_email')): ?>
								<div class="form-group">
									<input type="password" placeholder="Senha:" name="senha" value="" class="form-control">
								</div>
								<?php  endif;  ?>
								<div class="form-group text-right">
									<small class="btn-recover">Recuperar senha</small>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="btn" data-toggle="modal" data-target=".bs-example-modal-sm">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Acessar
									</button>
									<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
										<div class="modal-dialog modal-sm" role="document">
											<div class="modal-content">
												<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
												<span class="sr-only">Loading...</span>
											</div>
										</div>
									</div>
								</div>
							</form>
							<br />
				<div class="row">
					<div class="col-lg-12">
						<?php get_msg('errologin').'<br />'; ?>
					</div>
				</div>							
							<div class="row">
								<button class="btn btn-default btn-lg btn-block botao-square" id="btn-addition">
									CRIAR CONTA
								</button>
							</div>


				
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- BEGIN RECUPERAÇÃO DE SENHA -->
		<div class="row box recover <?php echo ($this->uri->segment(3) == '' || $this->uri->segment(3) == 'recuperar_senha') ? 'display' : ''; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-white text-center">Esqueci minha senha</h2>
				<hr class="light">
				<div class="row">					
					<div class="col-md-12 borda-div">
						<div class="col-lg-4 col-sm-6 offset-lg-4 bg-white">
							<h5>Opiniãopop <br /><small>Recuperação de conta</small></h5>
							<form action="<?php echo base_url('dashboard/autenticacao/recupera_senha') ?>" method="post" class="form form-estilo">
								<div class="form-group">
									<label>Entre com o seu e-mail cadastrado para recuperação de senha</label>
									<input type="text" placeholder="Email:" class="form-control">
								</div>
								<div class="form-group">
									<button type="submit" class="btn">
										Recuperar
									</button>
								</div>

							</form>
						<div class="row">
					<div class="col-lg-12">
						<?php get_msg('errorecover').'<br />'; ?>
					</div>
				</div>	
							<div class="row">
								<button class="btn btn-default btn-lg btn-block botao-square" id="btn-login">
									Fazer login
								</button>
							</div>
				<div class="row">
					<div class="col-lg-12">
						<?php get_msg('errologin') ?>
					</div>
				</div>							
						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- END RECUPERAÇÃO DE SENHA -->
		<!-- BEGIN CADASTRO -->
		<div class="row box addition <?php echo ($this->uri->segment(3) === 'criar_conta') ? '' : 'display'; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-white text-center">Faça seu Cadastro</h2>
				<hr class="light">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-4 col-sm-12 offset-lg-4 bg-white">
							<h5>Opiniãopop <small>Crie sua conta</small></h5>
							<form action="<?php echo base_url('dashboard/autenticacao/criar_conta'); ?>" method="post" class="form form-estilo" >
								<div class="form-group">
									<input type="text" placeholder="Nome completo" class="form-control" name="nome" value="" required="">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3 col-xs-4">
										<input type="text" placeholder="DDD" class="form-control" name="ddd" value="" required="">
										</div> 
										<div class="col-sm-9 col-xs-8">
											<input type="text" placeholder="Celular Ex:981234567" class="form-control" name="fone" value="" required="">
										</div> 
									</div>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Email" class="form-control" name="email" value="" required="">
								</div>
								<div class="form-group">
									<input type="password" placeholder="Senha" class="form-control" name="senha" required="">
								</div>
								<div class="form-group">
									<input type="password" placeholder="Repetir Senha" class="form-control" name="password">
								</div>
								<div class="form-group text-right">
									<small id="btn-voltar">Voltar para login</small>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="btn">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> CRIAR CONTA
									</button>
								</div>
							</form>
							
				<div class="row">
					<div class="col-lg-12">
						<?php get_msg('erro').'<br />'; ?>
					</div>
				</div>								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

