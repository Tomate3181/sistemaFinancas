<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="#">Finanças Inteligentes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="./index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="./gerenciadorDespesas.php">Gerenciador</a></li>

        <!-- Dropdown de simuladores -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="simuladorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Simulador
          </a>
          <ul class="dropdown-menu" aria-labelledby="simuladorDropdown">
            <li><a class="dropdown-item" href="./simuladorFinanciamento.php">Financiamento</a></li>
            <li><a class="dropdown-item" href="./simuladorInvestimento.php">Investimento</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="./educacao.php">Educação</a></li>
      </ul>

      <!-- Botão Dark Mode -->
      <button id="toggleMode" class="btn btn-outline-secondary ms-3">
        <i class="bi bi-moon-fill"></i>
      </button>
    </div>
  </div>
</nav>
