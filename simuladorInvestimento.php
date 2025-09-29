<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simulador de Investimentos</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="light-mode">
  <!-- Navbar -->
  <?php include_once "./navbar.php"; ?>

  <div class="container py-5">
    <!-- Título -->
    <div class="text-center mb-5">
      <h1 class="fw-bold">Simulador de Investimentos</h1>
      <p class="text-muted">Projete diferentes cenários e descubra quanto seu dinheiro pode render.</p>
    </div>

    <!-- Formulário -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Configurações do Investimento</h5>
        <form id="simuladorInvestimentoForm">
          <div class="row g-3">
            <!-- Tipo de Investimento -->
            <div class="col-md-4">
              <label class="form-label">Tipo de Investimento</label>
              <select id="tipoInvestimento" class="form-select">
                <option value="rendaFixa">Renda Fixa</option>
                <option value="fii">Fundo Imobiliário</option>
                <option value="cdb">CDB</option>
                <option value="lciLca">LCI / LCA</option>
                <option value="acoes">Ações</option>
              </select>
            </div>
            <!-- Valor Investido -->
            <div class="col-md-4">
              <label class="form-label">Valor Investido (R$)</label>
              <input type="number" id="valorInvestido" class="form-control" value="10000">
            </div>
            <!-- Prazo -->
            <div class="col-md-4">
              <label class="form-label">Prazo (anos)</label>
              <input type="range" id="prazoInvestimento" class="form-range" min="1" max="30" value="5">
              <span id="prazoInvestValue">5 anos</span>
            </div>
            <!-- Taxa de Juros / Rendimento -->
            <div class="col-md-4">
              <label class="form-label">Taxa de Juros / Rendimento (%) ao ano</label>
              <input type="range" id="taxaRendimento" class="form-range" min="1" max="20" step="0.1" value="8">
              <span id="rendimentoValue">8%</span>
            </div>
          </div>
          <button type="button" class="btn btn-success mt-3" id="btnSimularInvest">
            <i class="bi bi-bar-chart-fill"></i> Simular
          </button>
        </form>
      </div>
    </div>

    <!-- Resultado da simulação -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Resultado</h5>
        <p>Montante final: <span id="montanteFinal">R$ 0,00</span></p>
        <p>Juros acumulados: <span id="jurosAcumulado">R$ 0,00</span></p>
      </div>
    </div>

    <!-- Gráfico -->
    <div class="mt-5 text-center">
      <h5>Evolução do Investimento</h5>
      <div class="d-flex justify-content-center">
        <div style="width:100%; max-width:600px;">
          <canvas id="graficoInvestimento"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include_once "./footer.php"; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Script custom -->
  <script>
    // Atualiza labels dos sliders
    const prazoSlider = document.getElementById('prazoInvestimento');
    const prazoLabel = document.getElementById('prazoInvestValue');
    const jurosSlider = document.getElementById('taxaRendimento');
    const jurosLabel = document.getElementById('rendimentoValue');

    prazoSlider.addEventListener('input', () => prazoLabel.textContent = prazoSlider.value + ' anos');
    jurosSlider.addEventListener('input', () => jurosLabel.textContent = jurosSlider.value + '%');

    // Config inicial do gráfico
    const ctx = document.getElementById('graficoInvestimento');
    let grafico = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [],
        datasets: [{
          label: 'Montante acumulado',
          data: [],
          borderColor: '#198754',
          backgroundColor: 'rgba(25, 135, 84, 0.2)',
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    // Simulação de juros compostos
    const btnSimularInvest = document.getElementById('btnSimularInvest');
    btnSimularInvest.addEventListener('click', () => {
      const valor = parseFloat(document.getElementById('valorInvestido').value);
      const anos = parseInt(prazoSlider.value);
      const taxa = parseFloat(jurosSlider.value) / 100;

      const montante = valor * Math.pow(1 + taxa, anos);
      const juros = montante - valor;

      document.getElementById('montanteFinal').textContent = 'R$ ' + montante.toFixed(2);
      document.getElementById('jurosAcumulado').textContent = 'R$ ' + juros.toFixed(2);

      // Prepara dados ano a ano
      const labels = Array.from({length: anos + 1}, (_, i) => i + 'º ano');
      const data = Array.from({length: anos + 1}, (_, i) => valor * Math.pow(1 + taxa, i));

      // Atualiza gráfico
      grafico.data.labels = labels;
      grafico.data.datasets[0].data = data;
      grafico.update();
    });
  </script>

  <!-- Script para dark mode -->
  <script src="./darkmode.js"></script>
</body>
</html>
