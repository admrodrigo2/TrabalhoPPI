<div class="tab" id="newFunc">
	<div class="container">

		<h2>Cadastrar Funcionario</h2>
		<br>
		<form id="formFunc" action="" onsubmit="return cadFunc(this)" method="POST">
			<div>
				<h4>Dados Pessoais</h4>
				<div class="container">
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="nome">Nome:</label>
						<div class="col-sm-10">
							<input id="nome" type="text" name="nome" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="dataNasc">Nascimento:</label>
						<div class="col-sm-10">
							<input id="dataNasc" type="date" onchange="" name="dataNasc" class="form-control" required>
							<span class="text-danger" style="display: none;" id="errorMsgData">Data inválida</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2">Sexo:</label>
						<div class="col-sm-10">
							<div class="form-check">
								<input id="sexo1" type="radio" name="sexo" value="Masculino" class="form-check-input">
								<label class="form-check-label" for="sexo">Masculino</label>
							</div>
							<div class="form-check">
								<input id="sexo2" type="radio" name="sexo" value="Feminino" class="form-check-input">
								<label class="form-check-label" for="sexo">Feminino</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="estCivil">Est. Civil:</label>
						<div class="col-sm-10">
							<select id="estCivil" name="estCivil" class="form-control" required>
								<option value="">--Selecione uma opção--</option>
								<option value="solteiro">Solteiro</option>
								<option value="casado">Casado</option>
								<option value="divorciado">Divorciado</option>
								<option value="viuvo">Viúvo</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="cargo">Cargo:</label>
						<div class="col-sm-10">
							<select id="cargo" name="cargo" class="form-control" required>
								<option value="">--Selecione um Cargo--</option>
								<option value="medico">Médico</option>
								<option value="enfermeiro">Enfermeiro</option>
								<option value="secretario">Secretário</option>
								<option value="outro">Outro</option>
							</select>
						</div>
					</div>
					<div class="form-group row" id="divEsp" style="display: none;">
						<label class="col-form-label col-sm-2" for="especialidade">Especialidade:</label>
						<div class="col-sm-10">
							<input id="especialidade" type="text" name="especialidade" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div>
				<h4>Documentos</h4>
				<div class="container">
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="cpf">CPF:</label>
						<div class="col-sm-10">
							<input id="cpf" type="text" name="cpf" class="form-control" onkeyup="validaCPF(this.value)" required>
					          <span class="text-danger" style="display: none;" id="errorMsgCPF">CPF Inválido</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="rg">RG:</label>
						<div class="col-sm-10">
							<input id="rg" type="text" name="rg" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="carTrab">Cart. Trabalho:</label>
						<div class="col-sm-10">
							<input id="carTrab" type="text" name="carTrab" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
			<div>
				<h4>Endereço</h4>
				<div class="container">
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="cep">CEP</label>
						<div class="col-sm-10">
							<input id="cep" type="text" name="cep" class="form-control" onkeyup="buscaEnd(this.value)" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="tipLog">Tipo de Logradouro</label>
						<div class="col-sm-10">
							<input id="tipLog" type="text" name="tipLog" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="log">Logradouro</label>
						<div class="col-sm-10">
							<input id="log" type="text" name="log" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="num">Número</label>
						<div class="col-sm-10">
							<input id="num" type="number" name="num" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="comp">Complemento</label>
						<div class="col-sm-10">
							<input id="comp" type="text" name="comp" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="bairro">Bairro</label>
						<div class="col-sm-10">
							<input id="bairro" type="text" name="bairro" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="cidade">Cidade</label>
						<div class="col-sm-10">
							<input id="cidade" type="text" name="cidade" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-2" for="estado">Estado</label>
						<div class="col-sm-10">
							<input id="estado" type="text" name="estado" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
			<input class="btn btn-success btn-block" type="submit" name="submit" value="Cadastrar">
		</form>
	</div>
</div>