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
 <form class="form-estilo">
 
  <div class="form-group">
  	<div class="row">
  		     <div class="col-sm-4">
    <label for="amostragem">Amostragem</label>
    <select name="" id="amostragem">
    	<option value="">75 - Plano Free</option>
    </select>    
    </div>   
     <div class="col-sm-4">
    <label for="tipo">Tipo de uso</label>       
    <select name="" id="tipo">
    	<option value="">Uso acadêmico</option>
    	<option value="">Uso empresarial</option>
    	<option value="">Uso pessoal</option>
    </select>    
    </div>   
  </div> 
 </div>
  <div class="form-group">
  	<div class="row">  	
  	<div class="col-sm-6">
    <label for="titulo">Título da sua enquete</label>
    <input type="email" class="form-control" id="titulo" placeholder="">
    </div>
      	<div class="col-sm-2">
    <label for="abertura">Abertura</label>
    <input type="email" class="form-control" id="abertura" placeholder="01/01/2017">
    </div>
     <div class="col-sm-2">
    <label for="fechamento">Fechamento</label>
    <input type="email" class="form-control" id="fechamento" placeholder="31/01/2017">
    </div>
     <div class="col-sm-2">
    <label for="amostragem">Amostragem</label>
    <select class="form-control" name="" id="amostragem">
    	<option value="">75 - Plano Free</option>
    </select>    
    </div>    
    </div>
  </div>
  

  <div class="form-group">
    <label for="exampleInputFile">Entrada de arquivo</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Exemplo de texto de ajuda em nível de bloco.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Me selecione
    </label>
  </div>
  <button type="submit" class="btn btn-default">Enviar</button>
</form>
</form>
        </div>
      </div>
</div>

