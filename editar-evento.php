<?php 
$pageTitle = "Let'sGather - Editar Evento"; 
include 'includes/connection.php'; 
include 'includes/header.php'; 
include 'includes/navbar.php'; 

// Segurança: Verificar Login e ID
if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: eventos.php"); exit();
}

// Buscar dados do evento para preencher o formulário
$stmt = $dbh->prepare("SELECT * FROM eventos WHERE id = ? AND user_id = ?");
$stmt->execute([$_GET['id'], $_SESSION['user_id']]);
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$evento) {
    echo "<div class='container my-5 alert alert-danger'>Evento não encontrado ou sem permissão.</div>";
    include 'includes/footer.php'; exit();
}
?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="p-4 border rounded shadow-lg bg-light">
                <h2 class="text-center text-letsgather-blue mb-4">Editar Evento</h2>
                
                <form action="trataEdicaoEvento.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_evento" value="<?php echo $evento['id']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nome do Evento</label>
                        <input type="text" name="nome" class="form-control" value="<?php echo htmlspecialchars($evento['nome']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select" required>
                            <option value="social" <?php echo ($evento['tipo'] == 'social') ? 'selected' : ''; ?>>Social/Informal</option>
                            <option value="profissional" <?php echo ($evento['tipo'] == 'profissional') ? 'selected' : ''; ?>>Profissional</option>
                            <option value="desportivo" <?php echo ($evento['tipo'] == 'desportivo') ? 'selected' : ''; ?>>Desportivo/Cultural</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Data</label>
                            <input type="date" name="data" class="form-control" value="<?php echo $evento['data_evento']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" name="hora" class="form-control" value="<?php echo $evento['hora_evento']; ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Local</label>
                        <input type="text" name="local" class="form-control" value="<?php echo htmlspecialchars($evento['local_evento']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nova Imagem (Deixe vazio para manter a atual)</label>
                        <input type="file" name="imagem" class="form-control" accept="image/*">
                        <?php if($evento['imagem']): ?>
                            <div class="mt-2 text-muted small">Imagem atual: <?php echo $evento['imagem']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3"><?php echo htmlspecialchars($evento['descricao']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block fw-bold">Visibilidade</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visibilidade" value="publico" <?php echo ($evento['visibilidade'] == 'publico') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Público</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visibilidade" value="privado" <?php echo ($evento['visibilidade'] == 'privado') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Privado</label>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">Guardar Alterações</button>
                        <a href="detalhe-evento.php?id=<?php echo $evento['id']; ?>" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>