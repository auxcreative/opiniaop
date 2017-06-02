<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed'); ?>
<div class="container-fluid">
	<div class="container">
		<div class="row box login">
			<div class="col-lg-12">
				<h2 class="section-heading text-center text-white"></h2>
				<hr class="light">
			

				<div class="row">
					<div class="col-lg-12">

					 <?php foreach ($clientes as $relatorios) : ?>

						<h1>QUAL ENQUETE</h1>
						
						
					Data: <?php echo $relatorios-> data; ?> </br>
					Quem votou: <?php echo $relatorios-> id_votante; ?> </br>
					Qual Enquete: <?php echo $relatorios-> titulo; ?> </br>
					Resposta: <?php echo $relatorios-> texto; ?> </br>
					ID questao votada: <?php echo $relatorios-> id_questao_votada; ?> </br>
					
					
						<h1> QUEM VOTOU</h1>
					Nome: <?php echo $relatorios-> nome; ?> </br>
					E-mail: <?php echo $relatorios-> email; ?> </br>
					Fone: <?php echo $relatorios-> fone; ?> </br>
					Sexo: <?php echo $relatorios-> sexo; ?> 
					
					
					<?php endforeach; ?>
					

				</div>
					
			</div>
		</div>


	</div>
</div>
</div>