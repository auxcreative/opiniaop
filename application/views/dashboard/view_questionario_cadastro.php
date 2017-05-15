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
					<textarea class="form-control" rows="3" placeholder="Questionário" name="p#question"></textarea> 
					
				</div>
	
				<div class="checkbox">
					<label>
						<input type="checkbox" name="p#question" value="a">
						Ativo</label>
				</div>
				<button type="submit" class="btn btn-success">
					Enviar
				</button>
			</form>
		</div>
	</div>
</div>