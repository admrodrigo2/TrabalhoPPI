<div class="tab" id="listCont">
	<div class="container">
		<div>
			<div class="row">
				<h2 class="col-11">Lista de Contatos</h2>
				<span id="updateContatos" class="col-1" style="padding: 11px;">
					<a href="#" class="text-body" onclick="buscaCont()"><i class="fas fa-sync fa-lg"></i></a>
				</span>
			</div>
			<table id="contTable" class="table table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Motivo</th>
						<th>Mensagem</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
			<div class="alert alert-info alertDiv" id="noCont" role="alert">
				<p class="text-center">Olá! Não encontramos contatos cadastrados na nossa base de dados!</p>
			</div>
			<div class="alert alert-info alertDiv" id="buscandoC" role="alert">
				<p class="text-center">Atualizando dados! Aguarde um momento!</p>
			</div>
		</div>
	</div>
</div>