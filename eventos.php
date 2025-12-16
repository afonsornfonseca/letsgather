<?php 
$pageTitle = "Let'sGather - Nossos Eventos"; 
include 'includes/connection.php'; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 

try {
    $stmt = $dbh->query("SELECT * FROM eventos ORDER BY data_evento ASC");
    $todosEventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar eventos: " . $e->getMessage();
    $todosEventos = [];
}

$eventosSocial = [];
$eventosProfissional = [];
$eventosDesportivo = [];

foreach ($todosEventos as $ev) {
    if ($ev['tipo'] == 'social') {
        $eventosSocial[] = $ev;
    } elseif ($ev['tipo'] == 'profissional') {
        $eventosProfissional[] = $ev;
    } elseif ($ev['tipo'] == 'desportivo') {
        $eventosDesportivo[] = $ev;
    }
}

function desenharCarrossel($idCarousel, $listaEventos) {
    if (empty($listaEventos)) {
        echo '<p class="text-muted fst-italic ms-3">Ainda não existem eventos agendados nesta categoria.</p>';
        return;
    }

    echo '<div id="' . $idCarousel . '" class="carousel carousel-dark slide" data-bs-ride="false">';
    echo '<div class="carousel-inner">';

    $chunks = array_chunk($listaEventos, 4);

    foreach ($chunks as $index => $grupoEventos) {
        $activeClass = ($index === 0) ? 'active' : '';
        
        echo '<div class="carousel-item ' . $activeClass . '">';
        echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';

        foreach ($grupoEventos as $evento) {
            $imagem = !empty($evento['imagem']) ? 'imgs/' . $evento['imagem'] : 'imgs/placeholder.jpg';
            $dataFormatada = date('d.m', strtotime($evento['data_evento']));

            echo '
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="' . htmlspecialchars($imagem) . '" class="card-img-top w-100 img-card-cover" alt="' . htmlspecialchars($evento['nome']) . '" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">' . htmlspecialchars($evento['nome']) . '</h5>
                        <p class="card-text text-muted mb-2"><i class="bi bi-calendar-event me-1"></i> ' . $dataFormatada . ' | ' . date('H:i', strtotime($evento['hora_evento'])) . '</p>
                        <p class="card-text small text-secondary text-truncate"><i class="bi bi-geo-alt-fill me-1"></i> ' . htmlspecialchars($evento['local_evento']) . '</p>
                        <a href="detalhe-evento.php?id=' . $evento['id'] . '" class="btn btn-sm btn-outline-warning mt-2 w-100">Ver Detalhes</a>
                    </div>
                </div>
            </div>';
        }

        echo '</div>'; 
        echo '</div>'; 
    }

    echo '</div>'; 

    if (count($listaEventos) > 4) {
        echo '
        <button class="carousel-control-prev" type="button" data-bs-target="#' . $idCarousel . '" data-bs-slide="prev" style="width: 5%;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#' . $idCarousel . '" data-bs-slide="next" style="width: 5%;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>';
    }

    echo '</div>'; 
}
?>
    
    <div class="container mt-4 mb-5">
        <div class="p-5 text-center text-white rounded-3 hero-section">
            <h1 class="display-5 fw-bold" style="color: #FFD700;">Eventos Memoráveis com Let'sGather</h1>
            <p class="fs-4">Descubra os tipos de eventos que pode organizar e gerir na nossa plataforma.</p>
        </div>
    </div>

    <main class="container">
    
    <section class="mb-5 pb-5 border-bottom">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h2 class="mb-3 text-letsgather-blue"><i class="bi bi-gift-fill me-2 icon-yellow"></i> Social/Informal e Celebração</h2>
                <p class="lead">Desde jantares de amigos, festas de aniversário, a grandes celebrações.</p>
            </div>
        </div>
        <?php desenharCarrossel('carouselSocial', $eventosSocial); ?>
    </section>

    <section class="mb-5 pb-5 border-bottom">
        <div class="row mb-3">
             <div class="col-lg-12">
                <h2 class="mb-3 text-letsgather-blue"><i class="bi bi-briefcase-fill me-2 icon-yellow"></i> Profissional</h2>
                <p class="lead">Para reuniões, webinars, ou eventos corporativos.</p>
            </div>
        </div>
        <?php desenharCarrossel('carouselProfissional', $eventosProfissional); ?>
    </section>

    <section class="mb-5">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h2 class="mb-3 text-letsgather-blue"><i class="bi bi-dribbble me-2 icon-yellow"></i> Desportivo, Lazer e Cultural</h2>
                <p class="lead">Organize partidas de futebol, cinema ou passeios culturais.</p>
            </div>
        </div>
        <?php desenharCarrossel('carouselDesportivo', $eventosDesportivo); ?>
    </section>

    </main>

<?php 
include 'includes/footer.php'; 
?>