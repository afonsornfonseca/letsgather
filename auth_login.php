<?php
session_start();
require_once 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $dbh->prepare("SELECT id, nome, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nome'] = $user['nome'];
        $_SESSION['user_email'] = $email;

        header("Location: index.php"); 
        exit();
    } else {
        header("Location: login.php?erro=dados_incorretos");
        exit();
    }
}
?>