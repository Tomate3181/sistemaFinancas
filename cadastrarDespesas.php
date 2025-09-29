<?php
include_once "./conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];

    $sql = "INSERT INTO despesas (descricao, categoria, valor, data) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $descricao, $categoria, $valor, $data);

    if ($stmt->execute()) {
        header("Location: ./gerenciadorDespesas.php?msg=sucesso");
        exit();
    } else {
        echo "Erro ao cadastrar despesa: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

// --- Excluir despesa ---
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM despesas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ./gerenciadorDespesas.php?msg=excluido");
        exit();
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}

?>
