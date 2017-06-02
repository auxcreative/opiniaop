<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<ol class="breadcrumb">
  <li><a href="#">Início</a></li>
  <li><a href="#">Biblioteca</a></li>
  <li class="active">Dados</li>
</ol>
			<?php breadcrumb(); ?>
		</div>
		
	</div>
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<form method="post" class="form-estilo" action="<?php echo current_url();  ?>" >
				<div class="form-group <?php erros_validacao('nome'); ?>">
					<input type="text" class="form-control" value=""  placeholder="Titulo" name="p#nomeenquete">
					
					<div class="row">
		          <div class="col-lg-4 offset-lg-">
					<input type="text" class="form-control" value=""  placeholder="Quant.Amostragem" name="p#nomeenquete">
					<input type="date" class="form-control" value=""  placeholder="Data Abertura" name="p#nomeenquete">
					<input type="date" class="form-control" value=""  placeholder="Data Fechamento" name="p#nomeenquete">
				</div>
				</div>
				
				</div>
				
	
				<div class="checkbox">
					<label>
						<input type="checkbox" name="p#nomeenquete" value="aa">
						Ativo</label>
				</div>
				<button type="submit" class="btn btn-success">
					Enviar
				</button>
			</form>
		</div>
	</div>
</div>