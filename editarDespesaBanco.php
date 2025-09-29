<?php
include_once "./conexao.php";

// --- Atualizar despesa ---
if (isset($_POST['update'])) {
    $id        = intval($_POST['id']);
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $valor     = $_POST['valor'];
    $data      = $_POST['data'];

    $sql = "UPDATE despesas 
            SET descricao=?, categoria=?, valor=?, data=? 
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisi", $descricao, $categoria, $valor, $data, $id);

    if ($stmt->execute()) {
        header("Location: ./gerenciadorDespesas.php?msg=atualizado");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>