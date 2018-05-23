<nav class="navbar fixed-top navbar-expand-md navbar-dark" id="navbar">
  <a class="navbar-brand" href="#">Rodrigão</a>
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
        <form>
          <div class="form-group">
            <label>User: </label>
            <input class="form-control" type="text" name="user" placeholder="Digite o nome de usuário">
          </div>
          <div class="form-group">
            <label>Password: </label>
            <input class="form-control" type="password" name="senha" placeholder="Digite sua senha">
          </div>

          <input class="btn btn-success" type="submit" name="submit" value="Sign in">
        </form>
      </div>
      
    </div>
  </div>
</div>