<?php
session_start();
if (!isset($_SESSION['nomeUsuario'])) {
    header("Location: ./index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/stylePaginaPrincipal.css">
    <link rel="stylesheet" href="../style/stylePublicarPost.css">
    <script src="../scripts/scriptTelaPrincipalEstilo.js"></script>
    <title>Publicar Post</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="./paginaPrincipal.php" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="./publicarPost.html" class="nav-link">Publicar post</a></li>
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
            <a href="./paginaPrincipal.php">Início</a><br>
            <a href="">Publicar post</a><br>
            <a href="">Sua conta</a><br>
            <a href="">Sobre Nós</a><br>
            <a href="../backend/logout.php" class="sairDaConta">Sair</a>
        </div>
    </header>
    <div class="containerPrincipal">
        <div class="tituloContainerPrincipal">
            <h1>PUBLIQUE SEU POST</h1>
        </div>
        <hr>
        <form action="../backend/cadastrarPost.php" method="post">
            <label for="tituloPostNovo">Título da postagem:</label>
            <input type="text" name="tituloPostNovo" id="tituloPostNovo" placeholder="Digite o Título do seu post">
            <label for="descricaoPostNovo">Descrição da postagem:</label>
            <input type="text" name="descricaoPostNovo" id="descricaoPostNovo" placeholder="Digite a Descrição do seu post">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>