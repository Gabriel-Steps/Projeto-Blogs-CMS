<?php
session_start();
if (!isset($_SESSION['nomeUsuario'])) {
    header("Location: ./index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Blogs</title>
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/stylePaginaPrincipal.css">
</head>
<body>
    <header>
        <div class="cabecalhoDiv">
            <div class="containerInfoUsuario">
                Seja bem-vindo, <?php echo $_SESSION['nomeUsuario'] ?>
                <img class="imagemPerfilUsuario" src="../<?php echo htmlspecialchars($_SESSION['img_perfil']); ?>" alt="Imagem de perfil do usuário">
            </div>
            <a href="../backend/logout.php">Sair</a>
        </div>
    </header>
</body>
</html>