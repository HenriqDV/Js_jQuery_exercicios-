<?php
// Inclui a conexão com o banco
include("conexao.php");

// Obtém os dados enviados via POST
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

// Prepara a consulta SQL de atualização
$sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";

// Executa a atualização e verifica se foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    echo "Usuário atualizado com sucesso.<br>";
    echo "<a href='listar.php'>Voltar para a lista</a>";
} else {
    echo "Erro ao atualizar: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
