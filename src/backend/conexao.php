<?php
$host = 'seu-servidor';
$db = 'db_projetoblogs';
$user = 'seu-usuario';
$password = 'sua-senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar: ' . $e->getMessage();
}
?>