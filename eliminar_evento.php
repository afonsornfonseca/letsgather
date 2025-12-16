<?php
session_start();
require_once 'includes/connection.php';


if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: eventos.php");
    exit();
}

$evento_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

try {

    $stmt = $dbh->prepare("DELETE FROM eventos WHERE id = ? AND user_id = ?");
    $stmt->execute([$evento_id, $user_id]);

    if ($stmt->rowCount() > 0) {

        header("Location: eventos.php?msg=evento_eliminado");
    } else {

        header("Location: eventos.php?erro=sem_permissao");
    }

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>