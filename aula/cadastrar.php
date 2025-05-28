<?php
// Inclui o arquivo de conexão com o banco de dados (deve conter $conn = new mysqli(...) )
include("conexao.php");

// Recupera os dados enviados pelo formulário via método POST
$nome = $_POST['nome'];    // Recebe o valor do campo "nome"
$email = $_POST['email'];  // Recebe o valor do campo "email"
$matricula = $_POST['matricula'];  // Recebe o valor do campo "matricula"
$curso = $_POST['curso'];  // Recebe o valor do campo "curso"

// Prepara a instrução SQL usando placeholders (?) para evitar SQL Injection
$stmt = $conn->prepare("INSERT INTO alunos (nome, email, matricula, curso) VALUES (?, ?, ?, ?)");

// Faz o bind dos valores reais às interrogações da query
// "ss" indica que os dois parâmetros são strings (s = string)
// O primeiro "s" se refere a $nome e o segundo a $email
$stmt->bind_param("ssss", $nome, $email, $matricula, $curso);

// Executa a instrução preparada
if ($stmt->execute()) {
    // Se a execução for bem-sucedida, mostra mensagem de sucesso
    echo "Dados inseridos com segurança!";
    echo "<a href='index.html'>Voltar</a>";
} else {
    // Se houver erro, exibe mensagem de erro
    echo "Erro: " . $stmt->error;
}

// Encerra o statement (libera recursos da memória)
$stmt->close();

// Fecha a conexão com o banco de dados
$conn->close();
?>
