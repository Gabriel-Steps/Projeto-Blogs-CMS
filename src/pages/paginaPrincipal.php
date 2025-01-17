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
    <script src="../scripts/scriptTelaPrincipalEstilo.js"></script>
    <script src="../scripts/inserirPostagensTela.js" defer></script>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="#" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Publicar post</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Sua conta</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Sobre Nós</a></li>
                </ul>
            </div>
            <div class="containerUsario">
            <div class="containerInfoUsuario">
                <h3>Seja bem-vindo, <b><?php echo $_SESSION['nomeUsuario'] ?></b></h3>
                <img class="imagemPerfilUsuario" src="../<?php echo htmlspecialchars($_SESSION['img_perfil']); ?>" alt="Imagem de perfil do usuário">
            </div>
            </div>

            <div class="mobile-menu-icon">
                <button onclick="showMenu()"><img class="icon" src="../images/menu-icon.png" alt=""></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <a href="">Início</a><br>
            <a href="">Publicar post</a><br>
            <a href="">Sua conta</a><br>
            <a href="">Sobre Nós</a><br>
            <a href="../backend/logout.php" class="sairDaConta">Sair</a>
        </div>
    </header>
    <div id="container-posts" class="containerPosts"></div>
</body>
</html>