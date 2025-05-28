<?php
// Inclui a conexão com o banco
include("conexao.php");

// Obtém o ID do usuário via GET
$id = $_GET['id'];

// Prepara a consulta para selecionar o usuário com o ID fornecido
$sql = "SELECT * FROM alunos WHERE id = $id";
$result = $conn->query($sql);

// Verifica se encontrou o usuário
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Obtém os dados do usuário
?>
    <!-- Formulário para editar os dados -->
    <h2>Editar Usuário</h2>
    <form action="atualizar.php" method="POST">
        <!-- Campo oculto para enviar o ID -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br><br>

        <label>Matricula:</label><br>
        <input type="text" name="matricula" value="<?php echo htmlspecialchars($row['matricula']); ?>" required><br><br>

        <label>Curso:</label><br>
        <input type="text" name="curso" value="<?php echo htmlspecialchars($row['curso']); ?>" required><br><br>

        <input type="submit" value="Atualizar">
    </form>
<?php
} else {
    echo "Usuário não encontrado.";
}

$conn->close();
?>
