<?php 
$pageTitle = "Let'sGather - Nossos Eventos"; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

    <div class="container my-5">
        <h1 class="text-center mb-5">Entre em Contacto</h1>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="p-4 border rounded h-100">
                    <h3 class="mb-3">A Nossa Missão</h3>
                    <p class="lead">Transformamos os seus sonhos em eventos memoráveis. Do conceito à execução, cuidamos de cada detalhe.</p>
                    
                    <h3 class="mt-4">Detalhes de Contacto</h3>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-envelope-fill me-2"></i> E-mail: info@letsgather.com</li>
                        <li><i class="bi bi-phone-fill me-2"></i> Telefone: +351 21 123-4567</li>
                    </ul>
                    <p class="text-muted mt-4">2025 Let'sGather. Todos os direitos reservados.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mx-auto p-4 border border-2 border-letsgather-blue rounded">
                    <h3 class="mb-3 text-center">Planeie o Seu Evento</h3>
                    <form action="trataContacto.php" method="post"> 
                        
                        <div class="mb-2">
                            <label for="f-nome" class="form-label">Nome</label>
                            <input id="f-nome" name="fNome" type="text" class="form-control" placeholder="introduza o seu nome" required>
                        </div>

                        <div class="mb-2">
                            <label for="f-email" class="form-label">Email</label>
                            <input id="f-email" name="fEmail" type="email" class="form-control" placeholder="introduza o seu email" required>
                        </div>

                        <div class="mb-2">
                            <label for="f-tel" class="form-label">Contacto telefónico</label>
                            <input id="f-tel" name="fTel" pattern="\d+" type="text" class="form-control" >
                        </div>

                        <div class="mb-2">
                            <label for="f-dia" class="form-label">Data Preferencial</label>
                            <input id="f-dia" name="fDia" type="date" class="form-control">
                        </div>
                        
                        <div class="mb-2">
                            <label for="f-tipo-evento">Tipo de Evento</label>
                            <select id="f-tipo-evento" name="fTipoEvento" class="form-select" aria-label="Tipo de Evento">
                                <option selected>Selecione uma opção</option>
                                <option value="1">Social/Informal</option>
                                <option value="2">Celebração</option>
                                <option value="3">Profissional</option>
                                <option value="4">Desportivo</option>
                                <option value="5">Lazer/Cultural</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="f-mensagem" class="form-label">Mensagem</label>
                            <textarea id="f-mensagem" name="fMensagem" class="form-control" rows="3" placeholder="Detalhes do seu evento..."></textarea>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-letsgather-blue">Submeter Pedido</button>
                            <button type="reset" class="btn btn-outline-warning">Limpar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php 
include 'includes/footer.php'; 
?>