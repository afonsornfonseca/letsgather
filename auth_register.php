<?php
session_start();
require_once 'includes/connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $dbh->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        header("Location: registar.php?erro=email_existe");
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nome, email, password) VALUES (?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    
    if ($stmt->execute([$nome, $email, $passwordHash])) {in
        header("Location: login.php?sucesso=registado");
    } else {
        echo "Erro ao registar.";
    }
}
?>