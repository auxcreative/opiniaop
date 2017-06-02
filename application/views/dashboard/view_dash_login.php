<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
 ?>
<div class="container-fluid">
	<div class="container autencicacao">
		<div id="login" class="row box <?php echo($this -> uri -> segment(3) == '' || $this -> uri -> segment(3) === 'validacao') ? '' : 'display'; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-center text-white">Faça seu Login</h2>
				<hr class="light">
				<!-- BEGIN LOGIN -->

				<div class="row">
					<div class="col-lg-12">

						<div class="col-lg-4 col-sm-6 offset-lg-4 bg-white">
							<h5>Opiniãopop
							<br />
							<small>Acesse sua conta</small></h5>

							<form action="<?php echo base_url('dashboard/autenticacao/validacao'); ?>" method="post" class="form form-estilo">
								<div class="form-group">
									<input type="text" placeholder="digite seu email de acesso" name="email" value="<?php echo set_value('email',$this->session->userdata('log_email')) ?>" class="form-control" >
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
							<p class="btn-addition"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Criar minha conta</p>
							<div class="row">
								<div class="col-lg-12">
									<?php get_msg('errologin') . '<br />'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- BEGIN RECUPERAÇÃO DE SENHA -->
		<div id="recover" class="row box <?php echo($this -> uri -> segment(3) == '' || $this -> uri -> segment(3) == 'recuperar_senha') ? 'display' : ''; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-white text-center">Esqueci minha senha</h2>
				<hr class="light">
				<div class="row">
					<div class="col-md-12 borda-div">
						<div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-4 bg-white">
							<h5>Opiniãopop
							<br />
							<small>Recupere o acesso da sua conta</small></h5>
							<form action="<?php echo base_url('dashboard/autenticacao/recupera_senha') ?>" method="post" class="form form-estilo">

								<div class="form-group">
									<label>Digite o e-mail para recuperação de senha</label>
									<input type="text" placeholder="email:" class="form-control" name="email" value="" required="">
								</div>
								<div class="form-group text-right">
									<small class="btn-login"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Fazer login</small>&nbsp;&nbsp;&nbsp;&nbsp;
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
		<div id="addition" class="row box <?php echo($this -> uri -> segment(3) === 'criar_conta') ? '' : 'display'; ?>">
			<div class="col-lg-12">
				<h2 class="section-heading text-white text-center">Faça seu Cadastro</h2>
				<hr class="light">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-4 col-sm-12 offset-lg-4 bg-white">
							<h3><i class="fa fa-check-circle-o" aria-hidden="true"></i> Plano Free</h3>
							<form action="<?php echo base_url('dashboard/autenticacao/criar_conta'); ?>" method="post" class="form form-estilo" >
								<div class="form-group">
									<input type="text" placeholder="nome completo" class="form-control" name="nome" value="<?php echo set_value('nome','') ?>">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3 col-xs-4">
											<input type="text" placeholder="11 - ddd" class="form-control" name="ddd" value="<?php echo set_value('ddd','') ?>">
										</div>
										<div class="col-sm-9 col-xs-8">
											<input type="text" placeholder="988880000 - celular" class="form-control" name="fone" value="<?php echo set_value('fone','') ?>" >
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="text" placeholder="email" class="form-control" name="email" value="<?php echo set_value('email','') ?>">
								</div>
								<div class="form-group">
									<input type="password" placeholder="senha" class="form-control" name="senha" value="<?php echo set_value('senha','') ?>">
								</div>
								<div class="form-group">
									<input type="password" placeholder="repetir senha" class="form-control" name="password" value="<?php echo set_value('password','') ?>">
								</div>
								<div class="form-group text-right">
									<small class="btn-login"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Voltar para login</small>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="submit" class="btn">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> CRIAR CONTA
									</button>
								</div>
							</form>

							<div class="row">
								<div class="col-lg-12">
									<?php get_msg('erro') . '<br />'; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

