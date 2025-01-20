<?php
$host = 'seu-host';
$db = 'db_projetoblogs';
$user = 'seu-Usuario';
$password = 'sua-Senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar: ' . $e->getMessage();
}
?>