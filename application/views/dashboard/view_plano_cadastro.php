<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<?php echo breadcrumb(); ?>
		</div>
	
	</div>
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<form method="post" class="form-estilo" action="<?php echo current_url();  ?>" >
				<div class="form-group ">
					<input type="text" class="form-control" value=""  placeholder="Nome do Plano" name="p#nomeplano">
					
					<div class="row">
		          <div class="col-lg-3 ">
					<input type="text" class="form-control" value=""  placeholder="Preço R$" name="p#nomeplano">
					</div>	
					<div class="col-lg-3 ">
					<input type="text" class="form-control" value=""  placeholder="Amostragem" name="p#nomeplano">
					</div>
				</div>
				</div>
				
				<div class="checkbox">
					<label>
						<input type="checkbox" name="p#nomeplano" value="a">
						Liberação</label>
				</div>
	
				<div class="checkbox">
					<label>
						<input type="checkbox" name="p#nomeplano" value="b">
						Ativo</label>
				</div>
				<button type="submit" class="btn btn-success">
					Cadastrar
				</button>
			</form>
		</div>
	</div>
</div>