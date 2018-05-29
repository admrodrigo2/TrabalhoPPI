<nav class="navbar fixed-top navbar-expand-md navbar-dark" id="navbar">
  <a class="navbar-brand" href="#">Torvalds</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="alterNav()">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" onclick="openPage('home', this);">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="openPage('galeria', this);">Galeria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="openPage('contato', this);">Contato</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="openPage('agendamento', this);">Agendamento</a>
      </li>
    </ul>
    <button class="btn btn-info my-2 my-sm-0" data-toggle="modal" data-target="#ModalLogin">Login</button>
  </div>
</nav>

<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="loginCont" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginCont">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://matheussn23.atwebpages.com" target="_blank" method="POST" id="form-login">
          <div class="form-group">
            <label>User: </label>
            <input class="form-control" type="text" name="user" placeholder="Digite o nome de usuário" required>
          </div>
          <div class="form-group">
            <label>Password: </label>
            <input class="form-control" type="password" name="senha" placeholder="Digite sua senha" required>
          </div>
          <input type="hidden" name="initSession" value="1">

          <input class="btn btn-success " type="button" name="Btn" onclick="login(this)" value="Sign in">
        </form>
        <div class="alert alert-success" id="divSuccessMsg" style="display: none; margin-top: 12px; font-size: 1.2em;">
          <strong>Dados salvos com sucesso.</strong>
        </div>

        <div class="alert alert-danger" id="divErrorMsg" style="display: none; margin-top: 12px;">
          <strong>Ocorreu uma falha ao executar a operação: </strong><span id="errorMsg"></span>
        </div>
      </div>
      
    </div>
  </div>
</div>