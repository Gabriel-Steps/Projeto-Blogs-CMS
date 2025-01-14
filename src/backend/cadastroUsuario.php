<?php
include_once 'conexao.php';
session_start();

$nome = trim($_POST['campoNomeUsuarioNovo']);
$email = filter_var($_POST['campoEmailUsuarioNovo'], FILTER_SANITIZE_EMAIL);
$senha = trim($_POST['campoSenhausuarioNovo']);
$senhaHash = password_hash($senha, PASSWORD_BCRYPT);

if (isset($_FILES['enderecoImagemNovoUsuario']) && $_FILES['enderecoImagemNovoUsuario']['error'] == UPLOAD_ERR_OK) {
    // Pasta para salvar a imagem
    $diretorio = '../uploads/';
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0755, true); // Cria a pasta se não existir
    }

    // Caminho completo da imagem
    $nomeArquivo = uniqid() . '_' . basename($_FILES['enderecoImagemNovoUsuario']['name']);
    $caminhoImagem = $diretorio . $nomeArquivo;

    // Move o arquivo para a pasta
    if (move_uploaded_file($_FILES['enderecoImagemNovoUsuario']['tmp_name'], $caminhoImagem)) {
        // Caminho relativo para salvar no banco
        $caminhoRelativo = 'uploads/' . $nomeArquivo;

        // Insere no banco de dados
        $sql = "INSERT INTO usuarios(nome, email, senha, imagem) VALUES(:nome, :email, :senha, :imagem_perfil)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senhaHash, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':imagem_perfil', $caminhoRelativo, PDO::PARAM_STR);


        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $_SESSION['nomeUsuario'] = $nome;
                $_SESSION['img_perfil'] = $caminhoRelativo;
                echo "Usuário cadastrado com sucesso!";
                header("Location: ../pages/paginaPrincipal.php");
            } else {
                echo "Ocorreu um problema: Nenhum registro foi inserido.";
            }
        } else {
            echo "Erro ao executar o INSERT.";
        }
    }
}
?>
