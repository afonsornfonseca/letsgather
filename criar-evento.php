<?php 
$pageTitle = "Let'sGather - Planear Evento"; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

    <main class="container my-5">
        <h1 class="display-5 text-letsgather-blue text-center mb-4">Planear o Seu Novo Evento</h1>
        <p class="lead text-center mb-5">Centralize a organização do seu evento no Let'sGather. Preencha os detalhes e comece a partilhar!</p>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-4 border rounded shadow-lg bg-light">
                    <form action="trataCriacaoEvento.php" method="post" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label for="nome-evento" class="form-label">Nome do Evento</label>
                            <input id="nome-evento" name="nome_evento" type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo-evento" class="form-label">Tipo de Evento</label>
                            <select id="tipo-evento" name="tipo_evento" class="form-select" required>
                                <option value="" selected disabled>Selecione uma categoria...</option>
                                <option value="social">Social/Informal e Celebração</option>
                                <option value="profissional">Profissional / Corporativo</option>
                                <option value="desportivo">Desportivo, Lazer e Cultural</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="data-evento" class="form-label">Data</label>
                                <input id="data-evento" name="data_evento" type="date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="hora-evento" class="form-label">Hora de Início</label>
                                <input id="hora-evento" name="hora_evento" type="time" class="form-control">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="local-evento" class="form-label">Local</label>
                            <input id="local-evento" name="local_evento" type="text" class="form-control" placeholder="Morada ou Nome do Local" required>
                        </div>

                        <div class="mb-3">
                            <label for="imagem-evento" class="form-label">Imagem de Capa (Opcional)</label>
                            <input class="form-control" type="file" id="imagem-evento" name="imagem_evento" accept="image/*">
                            <div class="form-text">Formatos aceites: .jpg, .png, .jpeg</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="descricao-evento" class="form-label">Descrição Detalhada</label>
                            <textarea id="descricao-evento" name="descricao_evento" class="form-control" rows="3"></textarea>
                            <div class="form-text">Breve descrição do que irá acontecer.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block fw-bold">Visibilidade do Evento</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visibilidade" id="visibilidade-publico" value="publico" required>
                                <label class="form-check-label" for="visibilidade-publico"><i class="bi bi-globe me-1"></i> Público</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="visibilidade" id="visibilidade-privado" value="privado">
                                <label class="form-check-label" for="visibilidade-privado"><i class="bi bi-lock-fill me-1"></i> Privado</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-letsgather-blue btn-lg w-100 mt-3">Criar Evento</button>
                    </form>
                </div>
            </div>
        </div>

    </main>

<?php 
include 'includes/footer.php'; 
?>