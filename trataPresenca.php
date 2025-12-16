<?php
require_once 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evento_id = $_POST['evento_id'];
    $nome = $_POST['nome'];
    $status = $_POST['presenca'];

    if (!empty($evento_id) && !empty($nome) && !empty($status)) {
        try {
            $stmt = $dbh->prepare("INSERT INTO participacoes (evento_id, nome, status) VALUES (?, ?, ?)");
            $stmt->execute([$evento_id, $nome, $status]);
            
            header("Location: detalhe-evento.php?id=" . $evento_id);
            exit();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}

header("Location: eventos.php");
?>