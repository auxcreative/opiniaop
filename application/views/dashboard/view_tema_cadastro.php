<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<?php echo breadcrumb(); ?>
		</div>
		<div class="col-lg-6 offset-lg-3"><?php get_msg('msgerro'); get_msg('msgok') ?></div>
	</div>
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<form method="post" class="form-estilo" action="<?php echo current_url();  ?>" >
				<div class="form-group <?php erros_validacao('nome'); ?>">
					<input type="text" class="form-control" value=""  placeholder="Nome do tema" name="p#nometema">
				</div>
	
				<div class="checkbox">
					<label>
						<input type="checkbox" name="p#nometema" value="a">
						Ativo</label>
				</div>
				<button type="submit" class="btn btn-success">
					Enviar
				</button>
			</form>
		</div>
	</div>
</div>