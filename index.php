<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
    
 <header class="hero-section text-center pb-5">
    <div class="container">
        <h1 class="display-3 fw-bold">Let'sGather</h1>
        <h2 class="display-6">Onde os planos se encontram</h2>
        <p class="lead mt-4">Criado para resolver a complicação de organizar eventos em grupo. Centralizamos todo o processo: desde a escolha da data até à confirmação de participantes, eliminando as intermináveis trocas de mensagens e confusões habituais. </p>
        
        <div class="d-inline-flex gap-3 mt-4 justify-content-center">
            
            <a href="criar-evento.php" class="btn btn-warning btn-lg">
             Criar Evento
            </a>
            
            <a href="eventos.php" class="btn btn-warning btn-lg">
                Ver Eventos
            </a>
        </div>
        
    </div>
</header>

    <section class="container my-5">
        <h3 class="text-center mb-4">Tipos de Eventos que Pode Organizar</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-people-fill display-4 icon-yellow"></i>
                    <div class="card-body">
                        <h5 class="card-title">Social/Informal & Celebração</h5>
                        <p class="card-text">Coordene jantares, festas de aniversário ou encontros casuais facilmente.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-briefcase-fill display-4 text-letsgather-blue"></i>
                    <div class="card-body">
                        <h5 class="card-title">Profissional</h5>
                        <p class="card-text">Organize reuniões, workshops ou conferências de forma estruturada.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center p-3">
                    <i class="bi bi-activity display-4 icon-yellow"></i>
                    <div class="card-body">
                        <h5 class="card-title">Desportivo & Lazer/Cultural</h5>
                        <p class="card-text">Marque jogos, sessões de cinema, teatro ou passeios ao ar livre. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5 py-5 border-top border-bottom">
    <h3 class="text-center text-letsgather-blue mb-5">O Processo Simplificado em 3 Passos</h3>
    
    <div class="row row-cols-1 row-cols-md-3 g-5 text-center">
        
        <div class="col">
            <div class="rounded-circle d-inline-block p-4 mb-3 bg-warning">
                <h2 class="display-5 text-letsgather-blue fw-bold">1</h2>
            </div>
            <h4 class="text-letsgather-blue">Crie e Detalhe</h4>
            <p class="text-muted">Dê um nome ao seu evento, defina data, local e uma breve descrição.</p>
        </div>
        
        <div class="col">
            <div class="rounded-circle d-inline-block p-4 mb-3 bg-warning">
                <h2 class="display-5 text-letsgather-blue fw-bold">2</h2>
            </div>
            <h4 class="text-letsgather-blue">Convide e Confirme</h4>
            <p class="text-muted">Partilhe o link e receba as confirmações de presença (Sim/Não/Talvez).</p>
        </div>
        
        <div class="col">
            <div class="rounded-circle d-inline-block p-4 mb-3 bg-warning">
                <h2 class="display-5 text-letsgather-blue fw-bold">3</h2>
            </div>
            <h4 class="text-letsgather-blue">Desfrute</h4>
            <p class="text-muted">O Let'sGather trata da gestão. Você só precisa de aparecer e divertir-se!</p>
        </div>
        
    </div>
</section>

    <section class="container my-5 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h3 class="text-center text-letsgather-blue mb-4">O Problema que Resolvemos</h3>
            
            <div class="row g-4">
                
                <div class="col-md-6">
                    <div class="p-4 border rounded shadow-sm h-100 bg-warning text-dark" style="position: relative;"> 
                         <h4 class="text-dark"><i class="bi bi-x-octagon-fill me-2 text-danger"></i> A Dor da Organização Antiga</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">Intermináveis trocas de mensagens e confusões habituais.</li>
                            <li class="mb-2">Dificuldade em gerir a confirmação de participantes.</li>
                            <li class="mb-2">Informação dispersa em vários grupos ou emails.</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="p-4 border rounded shadow-sm h-100 bg-dark-custom text-white" style="position: relative; opacity: 0.9;">
                        <h4 class="text-white"><i class="bi bi-lightbulb-fill me-2 icon-yellow"></i> A Solução Let'sGather</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">A aplicação centraliza todo o processo de marcação num único espaço organizado.</li>
                            <li class="mb-2">Criação de eventos com nome, data, local e descrição.</li>
                            <li class="mb-2">Elimina as intermináveis trocas de mensagens e confusões habituais.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container my-5 text-center">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="p-4 border rounded bg-white h-100 shadow-sm">
                <h2 class="display-4 text-letsgather-blue fw-bold">150+</h2>
                <p class="lead">Eventos Criados por Mês</p>
            </div>
        </div>
        <div class="col">
            <div class="p-4 border rounded bg-white h-100 shadow-sm">
                <h2 class="display-4 text-letsgather-blue fw-bold">3K+</h2>
                <p class="lead">Utilizadores Ativos</p>
            </div>
        </div>
        <div class="col">
            <div class="p-4 border rounded bg-white h-100 shadow-sm">
                <h2 class="display-4 text-letsgather-blue fw-bold">95%</h2>
                <p class="lead">Confirmação de Presença </p>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>