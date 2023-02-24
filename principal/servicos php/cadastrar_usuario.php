<?php
// Captura os valores do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula =$_POST['matricula'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Conecta-se ao banco de dados
$dsn = 'mysql:host=localhost;dbname=nomedobancodedados';
$usuario = 'nomeusuariodobancodedados';
$senha = 'senhadobancodedados';

try {
    $conexao = new PDO($dsn, $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}

// Insere as informações do usuário no banco de dados
$sql = 'INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';
$stmt = $conexao->prepare($sql);
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':email', $email);
$stm ->bindValue(':matricula', $matricula);
$stmt->bindValue(':senha', $senha);
$stmt->execute();

// Exibe uma mensagem de sucesso
echo 'Cadastro realizado com sucesso!';
?>

