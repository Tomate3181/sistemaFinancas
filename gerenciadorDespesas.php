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
                <form method="POST" action="../app/controllers/DespesaController.php">
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
                    <h3 class="fw-bold text-primary">R$ 2.500,00</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h6 class="text-muted">Total Gasto</h6>
                    <h3 class="fw-bold text-danger">R$ 1.250,00</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <h6 class="text-muted">Saldo Disponível</h6>
                    <h3 class="fw-bold text-success">R$ 1.250,00</h3>
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
                    <tbody>
                        <tr>
                            <td>Aluguel</td>
                            <td>Moradia</td>
                            <td>1.000,00</td>
                            <td>2025-09-01</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Mercado</td>
                            <td>Alimentação</td>
                            <td>250,00</td>
                            <td>2025-09-05</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
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
        <script>
            // Exemplo de gráfico
            const ctx = document.getElementById('graficoDespesas');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Moradia', 'Alimentação', 'Transporte', 'Outros'],
                    datasets: [{
                        data: [1000, 250, 0, 0],
                        backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545']
                    }]
                }
            });
        </script>

        <!-- Script para dark mode -->
    <script src="./darkmode.js"></script>
</body>

</html>