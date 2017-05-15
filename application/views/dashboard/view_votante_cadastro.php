
	
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<?php echo breadcrumb(); ?>
		</div>
		
	</div>
	<div class="row">
		<div class="col-lg-6 offset-lg-3   borda-div ">
			<form method="post" class=" form form-estilo" action="<?php echo current_url();  ?>" >
				<div class="form-group <?php erros_validacao('p#nomevotante'); ?>">
					
		 			<select class="form-control" >
		 			
		 				<option selected="selected" >Sexo</option>
		 			
                        <option value= "masculico">Masculino</option>
                    <option value= "Fem.">Feminino</option>
					</select>
					
		 			<input type="text" class="form-control"  placeholder="Telefone" name="p#nomevotante">
		 			<input type="text" class="form-control"  placeholder="Email" name="p#nomevotante">
		 			<input type="text" class="form-control"  placeholder="Codigo da sessão" name="p#nomevotante">
			
	
	</div>
	
				<div class="checkbox">
					<label>
						<input type="checkbox" name="p#nomevotante" value="a2">
						Ativo</label>
				</div>
				<button type="submit" class="btn btn-success">
					Enviar
				</button>
			</form>
		</div>
	</div>
</div>