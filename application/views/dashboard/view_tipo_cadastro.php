
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<?php echo breadcrumb(); ?>
		</div>
		
	</div>
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<form method="post" class="form-estilo" action="<?php echo current_url();  ?>" >
				<div class="form-group <?php erros_validacao('nome'); ?>">
					<input type="text" class="form-control" value=""  placeholder="Tipo de enquete" name="p#nometipo">
					
				</div>
	
				<div class="checkbox">
					<label>
						<input type="checkbox" name="p#status" value="a">
						Ativo</label>
				</div>
				<button type="submit" class="btn btn-success">
					Enviar
				</button>
			</form>
		</div>
	</div>
</div>
