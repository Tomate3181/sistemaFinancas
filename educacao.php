<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Educação Financeira</title>
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
            <h1 class="fw-bold">Educação Financeira</h1>
            <p class="text-muted">Aprenda a entender os juros, gerenciar dívidas e investir de forma eficiente.</p>
        </div>

        <!-- Seção de artigos -->
        <div class="mb-5">
            <h3 class="mb-3">Artigos Educativos</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Tipos de Juros</h5>
                            <p class="card-text">Aprenda a diferença entre juros simples e compostos e como eles
                                impactam seu dinheiro.</p>
                            <a href="https://www.serasa.com.br/credito/blog/7-tipos-de-juros-para-voce-conhecer/" target='_blank' class="btn btn-primary btn-sm">Ler mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Reduzindo Dívidas</h5>
                            <p class="card-text">Estratégias práticas para quitar dívidas mais rápido e economizar
                                juros.</p>
                            <a href="https://www.creditas.com/exponencial/como-sair-das-dividas/" target='_blank' class="btn btn-primary btn-sm">Ler mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Investimentos Rentáveis</h5>
                            <p class="card-text">Como escolher investimentos seguros e rentáveis, de acordo com seu
                                perfil.</p>
                            <a href="https://www.sicredi.com.br/site/blog/investimentos/investimentos-mais-rentaveis-quando-arriscar-mais-na-hora-de-investir/" target='_blank' class="btn btn-primary btn-sm">Ler mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Seção de vídeos -->
        <div class="mb-5">
            <h3 class="mb-3">Vídeos Explicativos</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/WFN5dxBTMgA?si=vapveoX-koIg7klF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/8zj0GJKTWwE?si=_M4yEbY7ip3C5x4_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Seção de dicas rápidas -->
        <div class="mb-5">
            <h3 class="mb-3">Dicas Rápidas</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="alert alert-success" role="alert">
                        <strong>Controle mensal:</strong> Anote todas as despesas para identificar desperdícios.
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-warning" role="alert">
                        <strong>Quitar dívidas com juros altos:</strong> Priorize pagamentos de dívidas caras.
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-info" role="alert">
                        <strong>Invista regularmente:</strong> Faça aportes mensais mesmo em pequenas quantias.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include_once "./footer.php"; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para dark mode -->
    <script src="./darkmode.js"></script>
</body>

</html>