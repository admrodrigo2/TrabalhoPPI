<div class="tab" id="listAgen">
	<div class="container">
		<div>
			<div class="row">
				<h2 class="col-11">Lista de Agendamentos</h2>
				<span id="updateAgendamentos" class="col-1" style="padding: 11px;">
					<a href="#" class="text-body" onclick="buscaAgend()"><i class="fas fa-sync fa-lg"></i></a>
				</span>
			</div>
			<table id="agendTable" class="table table-striped">
				<thead>
					<tr>
						<th colspan="2">Médico</th>
						<th></th>
						<th colspan="2">Paciente</th>
					</tr>
					<tr>
						<th>Nome</th>
						<th>Especialidade</th>
						<th>Data e Hora</th>
						<th>Nome</th>
						<th>Telefone</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
			<div class="alert alert-info alertDiv" id="noAgend" role="alert">
				<p class="text-center">Olá! Não existem agendamentos cadastrados na nossa base de dados!</p>
			</div>
			<div class="alert alert-info alertDiv" id="buscandoA" role="alert">
				<p class="text-center">Atualizando dados! Aguarde um momento!</p>
			</div>
		</div>
	</div>
</div>