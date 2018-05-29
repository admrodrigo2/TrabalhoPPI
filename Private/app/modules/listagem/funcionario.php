<div class="tab" id="listFunc">
	<div class="container">
		<div>
			<div class="row">
				<h2 class="col-11">Lista de Funcionários</h2>
				<span id="updateFuncionario" class="col-1" style="padding: 11px;">
					<a href="#" class="text-body" onclick="buscaFunc()"><i class="fas fa-sync fa-lg"></i></a>
				</span>
			</div>
			<table id="funcTable" class="table table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Sexo</th>
						<th>Cargo</th>
						<th>RG</th>
						<th>Logradouro</th>
						<th>Cidade</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
			<div class="alert alert-info alertDiv" id="noFunc" role="alert">
				<p class="text-center">Olá! Não existem funcionários cadastrados na nossa base de dados!</p>
				<p class="text-center">Por favor, acesse a aba "Novo funcionário" para cadastra-los!</p>
			</div>
			<div class="alert alert-info alertDiv" role="alert">
				<p class="text-center">Atualizando dados! Aguarde um momento!</p>
			</div>
		</div>
	</div>
</div>