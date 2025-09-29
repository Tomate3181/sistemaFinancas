<?php
include_once "./conexao.php";

if (!isset($_GET['id'])) {
    header("Location: gerenciadorDespesas.php");
    exit();
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM despesas WHERE id = $id");
$despesa = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Despesa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Editar Despesa</h2>
        <form method="POST" action="./cadastrarDespesas.php">
            <input type="hidden" name="id" value="<?= $despesa['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <input type="text" name="descricao" class="form-control" 
                       value="<?= htmlspecialchars($despesa['descricao']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select name="categoria" class="form-select" required>
                    <?php
                    $categorias = ['Moradia', 'Alimentação', 'Transporte', 'Lazer', 'Saúde', 'Outros'];
                    foreach ($categorias as $cat) {
                        $selected = ($cat == $despesa['categoria']) ? "selected" : "";
                        echo "<option $selected>$cat</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Valor (R$)</label>
                <input type="number" step="0.01" name="valor" class="form-control" 
                       value="<?= $despesa['valor'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data</label>
                <input type="date" name="data" class="form-control" 
                       value="<?= $despesa['data'] ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Salvar Alterações</button>
            <a href="gerenciadorDespesas.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
