<div class="tab" id="agendamento">

	<section class="section section-top section-full">

	  <div class="bg-cover" style="background-image: url(assets/images/bg-agendamento.jpg);"></div>
	  <div class="bg-overlay"></div>
	  <div class="container">
	        <div class="row justify-content-center align-items-center">
	          <div class="col-md-8 col-lg-7 textoCentral">

	            <!-- Preheading -->
	            <p class="text-white text-uppercase text-center text-sm">
	              Clinica Rodrigão
	            </p>
	            
	            <!-- Heading -->
	            <h1 class="text-white text-center mb-4">
	              Agendamento
	            </h1>

	            <!-- Subheading -->
	            <p class="lead text-white text-center mb-5 animate" data-animation="fadeUp" data-animation-order="2" data-animation-trigger="entered">
	            	Agende sua consulta de forma rápida e simples! Utilize nosso sistema de agendamento online! Simples e intuitivo.
	            	Os melhores médicos disponivéis para melhor lhe atender no dia e horário que quiser!
	            </p>

	            <!-- Button -->
	            <p class="text-center text-white mb-0">
	              Faça parte dessa família!
	            </p>

	          </div>
	        </div> <!-- / .row -->
	      </div>
	  
	</section>

	<div class="container section">
		<div class="row align-items-center">

			<div class="col-md-12 order-md-1 text-left text-md-left pr-md-5">
				
				<h2>Realizar agendamento</h2><br>

				<form action="/action_page.php">

					<div class="form-group">
						<label for="especialidade">Especialidade:</label>
      					<select class="form-control" name="especialidade" id="especialidade"><option>Selecione a especialidade</option></select>
    				</div>

    				<div class="form-group">
 						<label for="medico">Médico:</label>
 						<select class="form-control" name="medico" id="medico"><option>Selecione o médico</option></select>
 					</div>

 					<div class="form-group">
  						<label for="consulta">Data da consulta:</label>
  						<input type="date" class="form-control" id="consulta" name="consulta" required>
					</div>

					<div class="form-group">
  						<label for="disponivel">Horário disponível :</label>
  						<select class="form-control" name="disponivel" id="disponivel"><option>Selecione o horário</option></select>
					</div>

					<div class="form-group">
						<label for="paciente">Nome do paciente:</label>
      					<input type="text" class="form-control" id="paciente" name="paciente" required>
    				</div>

    				<div class="form-group">
						<label for="telefone">Telefone do paciente:</label>
      					<input type="text" class="form-control" id="telefone" name="telefone" required>
    				</div>

					<div class="form-group"> 
      					<button type="submit" class="btn btn-default">Enviar</button>
  					</div>

  				</form>
			</div>
			
		</div>
	</div>
</div>
