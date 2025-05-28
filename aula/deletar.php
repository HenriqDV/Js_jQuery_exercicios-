<?php
// Inclui o arquivo de conexão
include("conexao.php");

// Obtém o ID via GET
$id = $_GET['id'];

// Prepara a consulta SQL para excluir o registro com o ID fornecido
$sql = "DELETE FROM alunos WHERE id = $id";

// Executa a exclusão e verifica se foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    echo "Usuário excluído com sucesso.<br>";
    echo "<a href='listar.php'>Voltar para a lista</a>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}

// Fecha a conexão com o banco
$conn->close();
?>
