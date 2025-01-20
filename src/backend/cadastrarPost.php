<?php
include_once 'conexao.php';
session_start();


$titulo = trim($_POST['tituloPostNovo']);
$descricao = trim($_POST['descricaoPostNovo']);
$agora = date('Y-m-d');

$sql = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $_SESSION['emailUsuario'], PDO::PARAM_STR);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$id_do_usuario = $resultado['id'];

$sql_inserir_post = "INSERT INTO postagens(titulo, conteudo, data_criacao, usuario_id) VALUES(:titulo, :descricao, :data_criacao, :usuario_id)";
$stmt_inserir_post = $pdo->prepare($sql_inserir_post);
$stmt_inserir_post->bindParam(':titulo', $titulo, PDO::PARAM_STR);
$stmt_inserir_post->bindParam(':descricao', $descricao, PDO::PARAM_STR);
$stmt_inserir_post->bindParam(':data_criacao', $agora, PDO::PARAM_STR);
$stmt_inserir_post->bindParam(':usuario_id', $id_do_usuario, PDO::PARAM_STR);


if ($stmt_inserir_post->execute()) {
    if ($stmt_inserir_post->rowCount() > 0) {
        echo "<script>alert(Post realizado com sucesso!);</script>";
        header("Location: ../pages/paginaPrincipal.php");
    } else {
        echo "Ocorreu um problema: Nenhum registro foi inserido.";
    }
}

?>