<?php
// Inclui a conexão com o banco de dados
include("conexao.php");

// Recupera os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

// Prepara a instrução SQL com placeholders
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");

// Substitui os placeholders pelos valores reais (s = string)
$stmt->bind_param("ss", $nome, $email);

// Executa o comando
if ($stmt->execute()) {
    echo "Dados inseridos com segurança!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
