<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simulador de Financiamento</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <h1 class="fw-bold">Simulador de Financiamento</h1>
      <p class="text-muted">Teste diferentes cenários e descubra o melhor financiamento para você.</p>
    </div>

    <!-- Formulário -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Configurações do Financiamento</h5>
        <form id="simuladorForm">
          <div class="row g-3">
            <!-- Tipo de financiamento -->
            <div class="col-md-4">
              <label class="form-label">Tipo de Financiamento</label>
              <select id="tipoFinanciamento" class="form-select">
                <option value="imobiliario">Imobiliário</option>
                <option value="veicular">Veicular</option>
                <option value="pessoal">Pessoal</option>
              </select>
            </div>
            <!-- Valor -->
            <div class="col-md-4">
              <label class="form-label">Valor (R$)</label>
              <input type="number" id="valorFinanciamento" class="form-control" value="100000">
            </div>
            <!-- Prazo -->
            <div class="col-md-4">
              <label class="form-label">Prazo (anos)</label>
              <input type="range" id="prazoFinanciamento" class="form-range" min="1" max="30" value="10">
              <span id="prazoValue">10 anos</span>
            </div>
            <!-- Taxa de Juros -->
            <div class="col-md-4">
              <label class="form-label">Taxa de Juros (%) ao ano</label>
              <input type="range" id="taxaJuros" class="form-range" min="1" max="15" step="0.1" value="7">
              <span id="jurosValue">7%</span>
            </div>
          </div>
          <button type="button" class="btn btn-primary mt-3" id="btnSimular">
            <i class="bi bi-calculator-fill"></i> Simular
          </button>
        </form>
      </div>
    </div>

    <!-- Resultado da simulação -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Resultado</h5>
        <p>Total a pagar: <span id="totalPagar">R$ 0,00</span></p>
        <p>Valor da parcela mensal: <span id="valorParcela">R$ 0,00</span></p>

        <!-- Gráfico -->
        <div class="d-flex justify-content-center mt-4">
          <div style="width:100%; max-width:600px;">
            <canvas id="graficoFinanciamento"></canvas>
          </div>
        </div>
      </div>
    </div>


  </div>

  <!-- Footer -->
  <?php include_once "./footer.php"; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Script custom -->
  <script>
    // Atualiza labels dos sliders
    const prazoSlider = document.getElementById('prazoFinanciamento');
    const prazoLabel = document.getElementById('prazoValue');
    const jurosSlider = document.getElementById('taxaJuros');
    const jurosLabel = document.getElementById('jurosValue');

    prazoSlider.addEventListener('input', () => prazoLabel.textContent = prazoSlider.value + ' anos');
    jurosSlider.addEventListener('input', () => jurosLabel.textContent = jurosSlider.value + '%');

    // Simulação simples
    const btnSimular = document.getElementById('btnSimular');
    btnSimular.addEventListener('click', () => {
      const valor = parseFloat(document.getElementById('valorFinanciamento').value);
      const anos = parseInt(prazoSlider.value);
      const juros = parseFloat(jurosSlider.value) / 100;
      const meses = anos * 12;

      // Fórmula de parcela fixa (PMT)
      const parcela = (valor * juros / 12) / (1 - Math.pow(1 + juros / 12, -meses));
      const total = parcela * meses;

      document.getElementById('valorParcela').textContent = 'R$ ' + parcela.toFixed(2);
      document.getElementById('totalPagar').textContent = 'R$ ' + total.toFixed(2);
    });
  </script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('graficoFinanciamento').getContext('2d');
    let chart;

    btnSimular.addEventListener('click', () => {
      const valor = parseFloat(document.getElementById('valorFinanciamento').value);
      const anos = parseInt(prazoSlider.value);
      const juros = parseFloat(jurosSlider.value) / 100;
      const meses = anos * 12;

      // Fórmula de parcela fixa (PMT)
      const parcela = (valor * juros / 12) / (1 - Math.pow(1 + juros / 12, -meses));
      const total = parcela * meses;

      document.getElementById('valorParcela').textContent = 'R$ ' + parcela.toFixed(2);
      document.getElementById('totalPagar').textContent = 'R$ ' + total.toFixed(2);

      // Calcula saldo devedor mês a mês
      let saldo = valor;
      let labels = [];
      let saldoRestante = [];

      for (let i = 1; i <= meses; i++) {
        let jurosMes = saldo * (juros / 12);
        let amortizacao = parcela - jurosMes;
        saldo -= amortizacao;

        labels.push("Mês " + i);
        saldoRestante.push(Math.max(saldo, 0)); // evita número negativo no fim
      }

      // Atualiza ou cria gráfico
      if (chart) {
        chart.destroy();
      }

      chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'Saldo devedor ao longo do tempo',
            data: saldoRestante,
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13, 110, 253, 0.2)',
            fill: true,
            tension: 0.2
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: true }
          },
          scales: {
            y: {
              beginAtZero: true,
              title: { display: true, text: 'Saldo (R$)' }
            },
            x: {
              title: { display: true, text: 'Meses' }
            }
          }
        }
      });
    });
  </script>




  <!-- Script para dark mode -->
  <script src="./darkmode.js"></script>
</body>

</html>