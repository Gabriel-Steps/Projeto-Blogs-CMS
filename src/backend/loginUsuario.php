<?php
session_start();
include_once 'conexao.php';

$email = filter_var($_POST['campoEmailUsuario'], FILTER_SANITIZE_EMAIL);
$senha = trim($_POST['campoSenhausuario']);

$sql = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado && password_verify($senha, $resultado['senha'])) {
    $_SESSION['nomeUsuario'] = $resultado['nome'];
    $_SESSION['img_perfil'] = $resultado['imagem'];
    $_SESSION['emailUsuario'] = $resultado['email'];
    header("Location: ../pages/paginaPrincipal.php");
    exit();
} else {
    echo "<script>
        alert('E-mail ou senha incorretos');
        window.location.href = '../pages/index.html';
    </script>";
    exit();
}
?>
