<?php
// Conectar-se ao banco de dados
$conn = mysqli_connect("localhost", "usuario", "senha", "banco_de_dados");

// Receber os dados do documento
$nome_documento = $_FILES["documento"]["name"];
$caminho_temporario = $_FILES["documento"]["tmp_name"];
$tipo_documento = $_FILES["documento"]["type"];
$tamanho_documento = $_FILES["documento"]["size"];

// Salvar o arquivo no servidor
$caminho_destino = "uploads/" . $nome_documento;
move_uploaded_file($caminho_temporario, $caminho_destino);

// Ler o conteúdo do arquivo
$conteudo_documento = file_get_contents($caminho_destino);

// Salvar as informações do documento no banco de dados
$sql = "INSERT INTO documentos (nome, conteudo, tipo, tamanho, data_envio) VALUES ('$nome_documento', '$conteudo_documento', '$tipo_documento', '$tamanho_documento', NOW())";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo "O documento foi salvo com sucesso.";
} else {
    echo "Ocorreu um erro ao salvar o documento: " . mysqli_error($conn);
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
