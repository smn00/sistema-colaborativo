<?php
// Conectar-se ao banco de dados
$conn = mysqli_connect("localhost", "usuario", "senha", "trabalho_t");

// Executar uma consulta SQL para recuperar os documentos
$sql = "SELECT * FROM doc";
$resultado = mysqli_query($conn, $sql);

// Formatar os documentos
if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $row["titulo"] . "</td><td><a href='" . $row["url"] . "' target='_blank'>Ver documento</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Não há documentos para exibir.";
}

// Verifica se o usuário está logado
if(!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
  }
  
  // Verifica as permissões de acesso do usuário
  if(!verificarPermissao($_SESSION['usuario'], $documento)) {
    header('HTTP/1.0 403 Forbidden');
    echo 'Você não tem permissão para acessar este documento.';
    exit();
  }
  
  // Se as permissões de acesso forem válidas, mostra o documento
  echo '<a href="' . $documento['caminho'] . '">Download do Documento</a>';

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
