<?php

function loginUsuario($user, $senha, $mysqli)
{
  $SQL = "
    SELECT usuario, senha
    FROM Usuario
    WHERE usuario = ?
    LIMIT 1
  ";
  
  $stmt = $mysqli->prepare($SQL);
  $stmt->bind_param('s', $user);
  $stmt->execute();
  $stmt->store_result();
  
  // Resgata o resultado nas variáveis
  $stmt->bind_result($nomeUsuario, $senhaUsuario);
  $stmt->fetch();

  if ($stmt->num_rows == 1)
  {
    if ($user == $nomeUsuario && $senha == $senhaUsuario)
    {

      $_SESSION['login'] = $nomeUsuario;
      $_SESSION['senha'] = $senhaUsuario;
      // Sucesso no login
      return true;
    }
    else
    {
      // Senha incorreta
      return false;
    }
  }
  else
  {
    // Usuário não existe
    return false;
  }
}

function checkUsuarioLogado($mysqli)
{
  // Check if all session variables are set
  if (!isset($_SESSION['login'], $_SESSION['senha']))
    return false;
  
  $username = $_SESSION['login'];
  $senha = $_SESSION['senha'];
    
  $SQL = "
    SELECT senha 
    FROM Usuario
    WHERE usuario = ?
    LIMIT 1
  ";
  
  $stmt = $mysqli->prepare($SQL);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->store_result();
  
  if ($stmt->num_rows == 1)
  {
    $stmt->bind_result($senhaHash);
    $stmt->fetch();
    
    if ($senha === $senhaHash)
      return true;
  }
  
  return false;
}

function checkOrDie($mysqli)
{
  if (!checkUsuarioLogado($mysqli))
  {
    $mysqli->close();
    header("Location: http://rodrigosr.atwebpages.com");
    die();
  }
}
?>