<?php
include_once 'conexao.php';
session_start();

try {
    $sql = "SELECT postagens.*, usuarios.nome AS nome_usuario, usuarios.imagem AS imagem_usuario FROM postagens INNER JOIN usuarios ON postagens.usuario_id = usuarios.id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultados);
} catch (PDOException $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
