<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
 ?>
<div class="container-fluid">
	<div class="card card-mini">
		<div class="card-header">
			<?php breadcrumb(); ?>
		</div>
		<div class="card-body">
			<div class="row">
				<?php get_msg('msgok'); get_msg('msgerro'); ?>				
			</div>
			<div class="container-fluid">
				<div class="row">					
					<h3><i class="fa fa-credit-card" aria-hidden="true"></i> <?php echo $usuario -> plano_nome; ?> <small>  - Plano atual</small></h3>
				</div>
				<br />
				<div class="row">
				<form class="form-estilo" action="<?php echo base_url('dashboard/usuario/conta') ?>" method="post" data-toggle="validator" role="form">
						<input name="id_plano" value="<?php echo $usuario -> plano_id; ?>" type="hidden" />
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="nome">Nome do usuário</label>
									<input type="text" name="nome"  value="<?php echo set_value('nome', $usuario->nome) ?>" id="nome" class="form-control" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="inputEmail">Email</label>
									<input type="email" name="email" data-minlength="5" value="<?php echo set_value('email',$usuario->email) ?>" id="inputEmail" data-error="Email i" class="form-control" required />
									
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-1">
									<label for="ddd">DDD</label>
									<input type="tel" name="ddd" maxlength="3" value="<?php echo set_value('fone',$usuario->ddd) ?>" id="ddd" class="form-control" required />
								</div>								
								<div class="col-sm-5">
									<label for="fone">Celular</label>
									<input type="tel" name="fone" maxlength="9" value="<?php echo set_value('fone',$usuario->fone) ?>" id="fone" class="form-control" required />
								</div>
							</div>
						</div>
						<div class="checkbox">							
								<input type="checkbox" <?php echo($usuario -> status == 'a') ? 'checked=""' : ''; ?> id="status"
								value="a" name="status"><label for="status"> Ativo </label>
						</div>
						<br />
						<button type="submit" class="btn btn-default">
							Salvar
						</button>
						
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#" data-toggle="modal" data-target=".senha-mudar"><i class="fa fa-lock" aria-hidden="true"></i> Alterar senha</a>
						</form>
						<!-- Small modal -->
			<div class="modal fade senha-mudar" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  			<div class="modal-dialog modal-sm" role="document">
    		<div class="modal-content">	  
    		<form action="<?php echo base_url('dashboard/usuario/alterar_senha') ?>" method="post" class="form-estilo" data-toggle="validator" role="form">	
	  <div class="modal-header">	  	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"><i class="fa fa-lock" aria-hidden="true"></i> Redefinir - <small> senha</small></h3>
      </div>
      <div class="modal-body">
      	
      	<div class="row">
      		
              		<div class="form-group">
      			<label for="senha">Senha antiga</label>
      			<input type="password" value="" id="senha" name="senha" class="form-control" required />
      		</div>
      		<div class="form-group">
      			<label for="inputPassword">Nova senha</label>
      			<input type="password" value="" data-minlength="6" name="password" class="form-control" id="inputPassword"  />
      		</div>
      		   <div class="form-group">
      			<label for="confirma">Repita a nova senha</label>
      			<input type="password" value="" name="confirma_senha" class="form-control" id="confirma" data-match="#inputPassword" 
      			required  />
      		</div>    	
      </div>
      </div>    
       <div class="modal-footer">
		<button type="submit" class="btn btn-success">Alterar</button>
      </div> 
       </form>
      	</div>
    </div>
  </div>
  
</div>
				</div>
				
			</div>
		</div>
	</div>
