<?php
session_start();
require_once 'includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    
    $id_evento = $_POST['id_evento'];
    $user_id = $_SESSION['user_id'];
   
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $local = $_POST['local'];
    $descricao = $_POST['descricao'];
    $visibilidade = $_POST['visibilidade'];

   
    
    $sql_imagem_extra = ""; 
    $params = [$nome, $tipo, $data, $hora, $local, $descricao, $visibilidade];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array(strtolower($extensao), $permitidas)) {
            $novoNome = uniqid('evento_') . '.' . $extensao;
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], 'imgs/' . $novoNome)) {

                $sql_imagem_extra = ", imagem = ?";
                $params[] = $novoNome;
            }
        }
    }

    $params[] = $id_evento;
    $params[] = $user_id;

    try {

        $sql = "UPDATE eventos SET 
                nome = ?, tipo = ?, data_evento = ?, hora_evento = ?, 
                local_evento = ?, descricao = ?, visibilidade = ? 
                $sql_imagem_extra
                WHERE id = ? AND user_id = ?";
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute($params);

        header("Location: detalhe-evento.php?id=" . $id_evento . "&msg=sucesso");

    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
} else {
    header("Location: eventos.php");
}
?>