<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Finanças Inteligentes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ícones Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS custom -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="light-mode">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">💰 Finanças Inteligentes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./index.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="./gerenciadorDespesas.php">Gerenciador</a></li>
                    <li class="nav-item"><a class="nav-link" href="./simuladorFinanciamento.php">Simulador</a></li>
                    <li class="nav-item"><a class="nav-link" href="./educacao.php">Educação</a></li>
                </ul>
                <!-- Botão Dark Mode -->
                <button id="toggleMode" class="btn btn-outline-secondary ms-3">
                    <i class="bi bi-moon-fill"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Domine suas Finanças</h1>
            <p class="lead">A educação financeira é a chave para liberdade e segurança no futuro.</p>
            <a href="#principal" class="btn btn-light btn-lg mt-3">Começar Agora</a>
        </div>
    </section>

    <!-- Cards principais -->
    <section id="principal" class="py-5">
        <div class="container">
            <div class="row text-center mb-4">
                <h2 class="fw-bold">Explore a Plataforma</h2>
                <p class="text-muted">Escolha uma área e comece sua jornada financeira.</p>
            </div>
            <div class="row g-4">
                <!-- Card Gerenciador -->
                <div class="col-md-4">
                    <div class="card p-4 h-100 text-center">
                        <i class="bi bi-wallet2 display-3 text-primary"></i>
                        <h5 class="mt-3 fw-bold">Gerenciador de Despesas</h5>
                        <p class="text-muted">Controle seus gastos e veja para onde seu dinheiro está indo.</p>
                        <a href="./gerenciadorDespesas.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
                <!-- Card Simulador -->
                <div class="col-md-4">
                    <div class="card p-4 h-100 text-center">
                        <i class="bi bi-calculator-fill display-3 text-success"></i>
                        <h5 class="mt-3 fw-bold">Simulador de Financiamento</h5>
                        <p class="text-muted">Descubra o valor das parcelas e planeje melhor seu futuro.</p>
                        <a href="./simuladorFinanciamento.php" class="btn btn-success">Simular</a>
                    </div>
                </div>
                <!-- Card Educação -->
                <div class="col-md-4">
                    <div class="card p-4 h-100 text-center">
                        <i class="bi bi-book-half display-3 text-warning"></i>
                        <h5 class="mt-3 fw-bold">Educação Financeira</h5>
                        <p class="text-muted">Aprenda sobre dívidas, juros e como investir com segurança.</p>
                        <a href="./educacao.php" class="btn btn-warning">Aprender</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Frase de impacto -->
    <section class="py-5 quote-section">
        <div class="container text-center">
            <blockquote class="blockquote">
                <p class="mb-0 fs-4">"Quem não sabe para onde vai, qualquer caminho serve. Mas quem entende de finanças,
                    constrói seu futuro."</p>
                <footer class="blockquote-footer mt-2">Anon</footer>
            </blockquote>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">&copy;
                <?php echo date("Y"); ?> Finanças Inteligentes. Todos os direitos reservados.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script para dark mode -->
    <script src="./darkmode.js"></script>

</body>

</html>