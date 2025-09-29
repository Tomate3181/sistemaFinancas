<?php
include_once "./conexao.php";

// Orçamento fixo (pode virar tabela no futuro)
$orcamentoMensal = 2500;

// Total gasto
$sqlTotal = "SELECT SUM(valor) as total FROM despesas";
$resultTotal = $conn->query($sqlTotal);
$totalGasto = $resultTotal->fetch_assoc()['total'] ?? 0;

// Saldo disponível
$saldo = $orcamentoMensal - $totalGasto;

// Categorias fixas
$categoriasFixas = ["Moradia", "Alimentação", "Transporte", "Lazer", "Saúde", "Outros"];
$valoresCategorias = array_fill(0, count($categoriasFixas), 0);

$sqlCat = "SELECT categoria, SUM(valor) as total FROM despesas GROUP BY categoria";
$resultCat = $conn->query($sqlCat);

while ($row = $resultCat->fetch_assoc()) {
    $cat = ucfirst($row['categoria']); 
    $indice = array_search($cat, $categoriasFixas);
    if ($indice !== false) {
        $valoresCategorias[$indice] = (float)$row['total'];
    }
}

$categoriasJSON = json_encode($categoriasFixas);
$valoresJSON = json_encode($valoresCategorias);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de Despesas</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS custom -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="light-mode">
    <!-- Navbar -->
    <?php include_once "./navbar.php"; ?>

    <?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-dismissible fade show 
        <?php
            if ($_GET['msg'] === 'sucesso') echo 'alert-success';
            elseif ($_GET['msg'] === 'atualizado') echo 'alert-primary';
            elseif ($_GET['msg'] === 'excluido') echo 'alert-warning';
            else echo 'alert-danger';
        ?>"
        role="alert">
        <?php
            if ($_GET['msg'] === 'sucesso') echo '<i class="bi bi-check-circle"></i> Despesa cadastrada com sucesso!';
            elseif ($_GET['msg'] === 'atualizado') echo '<i class="bi bi-pencil-square"></i> Despesa atualizada com sucesso!';
            elseif ($_GET['msg'] === 'excluido') echo '<i class="bi bi-trash"></i> Despesa excluída com sucesso!';
            else echo '<i class="bi bi-exclamation-triangle"></i> Ocorreu um erro, tente novamente.';
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>


    <div class="container py-5">
        <!-- Título -->
        <div class="text-center mb-5">
            <h1 class="fw-bold">Gerenciador de Despesas Mensal</h1>
            <p class="text-muted">Acompanhe suas despesas e controle seu orçamento pessoal.</p>
        </div>

        <!-- Formulário de cadastro -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Adicionar Nova Despesa</h5>
                <form method="POST" action="./cadastrarDespesas.php">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Descrição</label>
                            <input type="text" name="descricao" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Categoria</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">Selecione...</option>
                                <option>Moradia</option>
                                <option>Alimentação</option>
                                <option>Transporte</option>
                                <option>Lazer</option>
                                <option>Saúde</option>
                                <option>Outros</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Valor (R$)</label>
                            <input type="number" step="0.01" name="valor" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Data</label>
                            <input type="date" name="data" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="bi bi-plus-circle"></i> Adicionar
                    </button>
                </form>
            </div>
        </div>

        <!-- Orçamento -->
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h6 class="text-muted">Orçamento Mensal</h6>
                    <h3 class="fw-bold text-primary">R$ <?php echo number_format($orcamentoMensal, 2, ',', '.'); ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h6 class="text-muted">Total Gasto</h6>
                    <h3 class="fw-bold text-danger">R$ <?php echo number_format($totalGasto, 2, ',', '.'); ?></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h6 class="text-muted">Saldo Disponível</h6>
                    <h3 class="fw-bold text-success">R$ <?php echo number_format($saldo, 2, ',', '.'); ?></h3>
                </div>
            </div>
        </div>


        <!-- Tabela de despesas -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Despesas Registradas</h5>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Valor (R$)</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <?php
                        include_once "./conexao.php";
                        $result = $conn->query("SELECT * FROM despesas ORDER BY data DESC");
                    ?>

                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($row['descricao']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['categoria']) ?>
                            </td>
                            <td>
                                <?= number_format($row['valor'], 2, ',', '.') ?>
                            </td>
                            <td>
                                <?= $row['data'] ?>
                            </td>
                            <td>
                                <a href="editarDespesa.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                                </a>

                                <a href="./cadastrarDespesas.php?delete=<?= $row['id'] ?>" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir esta despesa?')">
                                <i class="bi bi-trash"></i>
                                </a>

                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>
        </div>

        <!-- Espaço para gráfico no futuro -->

        <div class="mt-5 text-center">
            <h5>Evolução do Orçamento</h5>
            <div class="d-flex justify-content-center">
                <div style="width: 100%; max-width: 400px;">
                    <canvas id="graficoDespesas"></canvas>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <?php include_once "./footer.php"; ?>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Chart.js para gráfico -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Script custom -->
        <script src="assets/js/main.js"></script>


        <?php
        include_once "./conexao.php";

        // Define todas as categorias fixas
        $categoriasFixas = ["Moradia", "Alimentacao", "Transporte", "Lazer", "Saude", "Outros"];
        $valoresCategorias = array_fill(0, count($categoriasFixas), 0);

        // Busca os totais agrupados
        $sql = "SELECT categoria, SUM(valor) as total FROM despesas GROUP BY categoria";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $cat = ucfirst($row['categoria']); // ajusta para mesma capitalização
            $indice = array_search($cat, $categoriasFixas);
            if ($indice !== false) {
                $valoresCategorias[$indice] = (float)$row['total'];
            }
        }

        // Converte em JSON
        $categoriasJSON = json_encode($categoriasFixas);
        $valoresJSON = json_encode($valoresCategorias);
        ?>



        <script>
    const ctx = document.getElementById('graficoDespesas');

    const categorias = <?php echo $categoriasJSON; ?>;
    const valores = <?php echo $valoresJSON; ?>;

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: categorias,
            datasets: [{
                data: valores,
                backgroundColor: [
                    '#0d6efd', // Moradia
                    '#198754', // Alimentação
                    '#ffc107', // Transporte
                    '#fd7e14', // Lazer
                    '#dc3545', // Saúde
                    '#6f42c1'  // Outros
                ]
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>



        <!-- Script para dark mode -->
        <script src="./darkmode.js"></script>
</body>

</html>