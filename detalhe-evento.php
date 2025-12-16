<?php 
$pageTitle = "Let'sGather - Detalhes do Evento"; 
include 'includes/connection.php'; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 


$protocolo = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$linkAtual = $protocolo . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . urlencode($linkAtual);

if (!isset($_GET['id'])) {
    echo '<div class="container my-5 alert alert-danger">Evento não encontrado.</div>';
    include 'includes/footer.php'; exit();
}

$id = $_GET['id'];

$stmt = $dbh->prepare("SELECT * FROM eventos WHERE id = ?");
$stmt->execute([$id]);
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$evento) {
    echo '<div class="container my-5 alert alert-warning">Evento inválido.</div>';
    include 'includes/footer.php'; exit();
}

$stmt = $dbh->prepare("SELECT * FROM participacoes WHERE evento_id = ? ORDER BY created_at DESC");
$stmt->execute([$id]);
$participantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$confirmados = [];
$talvez = [];
$ausentes = [];

foreach ($participantes as $p) {
    if ($p['status'] == 'Sim') $confirmados[] = $p;
    elseif ($p['status'] == 'Talvez') $talvez[] = $p;
    elseif ($p['status'] == 'Nao') $ausentes[] = $p;
}

$imagem = !empty($evento['imagem']) ? 'imgs/' . $evento['imagem'] : 'imgs/placeholder.jpg';
$dataFormatada = date('d.m', strtotime($evento['data_evento']));
$horaFormatada = date('H:i', strtotime($evento['hora_evento']));
?>

    <main class="container my-5">
        <div class="row mb-5">
        <div class="col-12 text-center">
            <img src="<?php echo htmlspecialchars($imagem); ?>" alt="<?php echo htmlspecialchars($evento['nome']); ?>" class="img-fluid rounded shadow img-detail-cover" style="max-height: 400px; width: 100%; object-fit: cover;">
        </div>
        <div class="col-12 text-center mt-4">
            <h1 class="display-4 text-letsgather-blue"><?php echo htmlspecialchars($evento['nome']); ?></h1>
            <p class="lead"><?php echo nl2br(htmlspecialchars($evento['descricao'])); ?></p>
            
            <h3 class="mt-4 icon-yellow">
                <i class="bi bi-calendar3"></i> <?php echo $dataFormatada; ?> | 
                <i class="bi bi-geo-alt-fill"></i> <?php echo htmlspecialchars($evento['local_evento']); ?> | 
                <i class="bi bi-clock-fill"></i> <?php echo $horaFormatada; ?>h
            </h3>

            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $evento['user_id']): ?>
                <div class="mt-3 mb-1">
                    <a href="editar-evento.php?id=<?php echo $evento['id']; ?>" class="btn btn-warning btn-sm me-2">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    
                    <a href="eliminar_evento.php?id=<?php echo $evento['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem a certeza?');">
                        <i class="bi bi-trash-fill"></i> Eliminar
                    </a>
                </div>
            <?php endif; ?>

            <div class="mt-2 mb-3 mx-auto" style="max-width: 80%; height: 300px;">
                <iframe 
                    width="100%" 
                    height="100%" 
                    style="border:0; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);" 
                    loading="lazy" 
                    allowfullscreen 
                    src="https://maps.google.com/maps?q=<?php echo urlencode($evento['local_evento']); ?>&t=&z=15&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>


            <div class="mt-4 d-flex justify-content-center gap-2">
                
                <button onclick="copiarLink()" class="btn btn-letsgather-blue btn-sm rounded-pill px-4">
                    <i class="bi bi-share-fill me-2"></i> Copiar Link
                </button>
                
                <span id="msgCopiado" class="ms-2 text-success fw-bold align-self-center" style="display: none;">
                    <i class="bi bi-check-lg"></i>
                </span>

                <button type="button" class="btn btn-letsgather-blue btn-sm rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalQRCode">
                    <i class="bi bi-qr-code me-2"></i> QR Code
                </button>
            </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="p-4 border rounded shadow-sm bg-light">
                    <h2 class="text-letsgather-blue mb-4">Confirmação de Presença</h2>
                    <p>Use esta secção para confirmar a sua disponibilidade e evitar as trocas de mensagens habituais!</p>
                    
                    <form action="trataPresenca.php" method="post">
                        <input type="hidden" name="evento_id" value="<?php echo $evento['id']; ?>">

                        <div class="mb-3">
                            <label for="f-nome" class="form-label">Seu Nome</label>
                            <input id="f-nome" name="nome" type="text" class="form-control" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label d-block">Estará presente?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presenca" id="presencaSim" value="Sim" required>
                                <label class="form-check-label" for="presencaSim">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presenca" id="presencaTalvez" value="Talvez">
                                <label class="form-check-label" for="presencaTalvez">Talvez</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presenca" id="presencaNao" value="Nao">
                                <label class="form-check-label" for="presencaNao">Não (Ausente)</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-letsgather-blue w-100">Confirmar Presença</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <h2 class="text-letsgather-blue mb-3 text-center">Lista de Participantes</h2>

                <div class="accordion" id="listaParticipantes">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingConfirmados">
                            <button class="accordion-button bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConfirmados">
                                <i class="bi bi-check-circle-fill me-2"></i> **Confirmados (<?php echo count($confirmados); ?>)**
                            </button>
                        </h2>
                        <div id="collapseConfirmados" class="accordion-collapse collapse show" data-bs-parent="#listaParticipantes">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <?php foreach($confirmados as $p): ?>
                                        <li class="list-group-item"><?php echo htmlspecialchars($p['nome']); ?></li>
                                    <?php endforeach; ?>
                                    <?php if(empty($confirmados)) echo '<li class="list-group-item text-muted">Ainda ninguém confirmou.</li>'; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTalvez">
                            <button class="accordion-button collapsed bg-warning text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTalvez">
                                <i class="bi bi-question-circle-fill me-2"></i> **Talvez (<?php echo count($talvez); ?>)**
                            </button>
                        </h2>
                        <div id="collapseTalvez" class="accordion-collapse collapse" data-bs-parent="#listaParticipantes">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <?php foreach($talvez as $p): ?>
                                        <li class="list-group-item"><?php echo htmlspecialchars($p['nome']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingAusentes">
                            <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAusentes">
                                <i class="bi bi-x-circle-fill me-2"></i> **Ausentes (<?php echo count($ausentes); ?>)**
                            </button>
                        </h2>
                        <div id="collapseAusentes" class="accordion-collapse collapse" data-bs-parent="#listaParticipantes">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <?php foreach($ausentes as $p): ?>
                                        <li class="list-group-item"><?php echo htmlspecialchars($p['nome']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div> 
            </div>
        </div>

    </main>
    <script>

function copiarLink() {
    
    var linkAtual = window.location.href;
    
    
    navigator.clipboard.writeText(linkAtual).then(function() {
        
        
        var msg = document.getElementById("msgCopiado");
        msg.style.display = "inline";
        
        
        setTimeout(function() {
            msg.style.display = "none";
        }, 2000);
        
    }, function(err) {
        alert('Não foi possível copiar o link automaticamente.');
    });
}
</script>
<div class="modal fade" id="modalQRCode" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title">Partilhar Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-3">Mostre este código aos seus amigos para eles acederem ao evento:</p>
        <img src="<?php echo $qrCodeUrl; ?>" alt="QR Code do Evento" class="img-fluid border p-2 rounded shadow-sm">
        <p class="text-muted mt-3 small"><?php echo $evento['nome']; ?></p>
      </div>
    </div>
  </div>
</div>

<?php 
include 'includes/footer.php'; 
?>

<?php 
include 'includes/footer.php'; 
?>