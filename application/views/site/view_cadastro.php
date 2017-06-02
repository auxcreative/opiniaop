<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

$grupo = $this -> checkout -> get_grupo();
?>

	<!-- BEGIN CADASTRO-->
		<div class="row">
		<div class="col-md-12 borda-div">
		<div class="col-md-2 col-sm-6 col-sm-offset-3 col-md-offset-5">
		<form class="form form-estilo">
            <div class="form-group">
				<h5>Criar conta</h5>
				<input type="text" placeholder="Nome completo" class="form-control">
            </div>
			<div class="form-group">
				<input type="text" placeholder="Celular" class="form-control">
			</div>
			<div class="form-group">
				<input type="text" placeholder="Cidade" class="form-control">
			</div>
			<div class="form-group">

				<select class="form-control form-estado">
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espírito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="SC">Santa Catarina</option>
						<option value="SP">São Paulo</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantins</option>
				</select>
			</div>
			<div class="form-group">
			<label>Detalhes da Conta</label>
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Senha" class="form-control">
            </div>
			<div class="form-group">
              <input type="password" placeholder="Repetir Senha" class="form-control">
            </div>
			<div class="form-group">
			 <button type="submit" class="btn btn-default"><span class="glyphicon" aria-hidden="true"></span>Criar Conta</button>
            </div>

          </form>
		  </div>
		  </div>
		  </div>
