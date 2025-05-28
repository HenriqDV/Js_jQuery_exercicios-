<?php
include("conexao.php");

$sql = "SELECT * FROM alunos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Usuários</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Matricula</th><th>Curso</th><th>Ações</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["matricula"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["curso"]) . "</td>";

        // Adiciona link para a página de edição, passando o ID como parâmetro GET
        echo "<td><a href='editar.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Editar</a>
                  <a href='deletar.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Deletar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}

$conn->close();
?>
