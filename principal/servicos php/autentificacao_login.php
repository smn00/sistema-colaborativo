<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Captura os valores do formulário
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Verifica se as credenciais de login são válidas
  if (verificarCredenciais($email, $senha)) {
    // Inicia uma sessão e armazena informações do usuário
    $_SESSION['email'] = $email;
    
    // Redireciona para a página inicial do site
    header('Location: tela.html');
    exit();
  } else {
    // Exibe uma mensagem de erro se as credenciais de login forem inválidas
    echo 'Nome de usuário ou senha inválidos.';
  }
}
?>
