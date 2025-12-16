<?php
session_start();
require_once 'includes/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user_id = $_SESSION['user_id'];
    $nome = $_POST['nome_evento'];
    $tipo = $_POST['tipo_evento'];
    $data = $_POST['data_evento'];
    $hora = $_POST['hora_evento'];
    $local = $_POST['local_evento'];
    $descricao = $_POST['descricao_evento'];
    $visibilidade = $_POST['visibilidade'];
    
    $nomeImagem = null; 
    
    if (isset($_FILES['imagem_evento']) && $_FILES['imagem_evento']['error'] === 0) {
        $extensao = pathinfo($_FILES['imagem_evento']['name'], PATHINFO_EXTENSION);
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array(strtolower($extensao), $extensoesPermitidas)) {
            $novoNomeImagem = uniqid('evento_') . '.' . $extensao;
            $destino = 'imgs/' . $novoNomeImagem;
            
            if (move_uploaded_file($_FILES['imagem_evento']['tmp_name'], $destino)) {
                $nomeImagem = $novoNomeImagem;
            }
        }
    }

    try {
        $sql = "INSERT INTO eventos (user_id, nome, tipo, data_evento, hora_evento, local_evento, descricao, imagem, visibilidade) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$user_id, $nome, $tipo, $data, $hora, $local, $descricao, $nomeImagem, $visibilidade]);

        header("Location: eventos.php?sucesso=evento_criado");
        exit();

    } catch (PDOException $e) {
        echo "Erro ao criar evento: " . $e->getMessage();
    }
} else {
    header("Location: criar-evento.php");
    exit();
}
?>