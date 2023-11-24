<?php
include_once('conexao.php');
$nome = $_GET['nome'];
$sql = "INSERT INTO usuario (Nickname) VALUES ('$nome')";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balanceador Quimico</title>
</head>
<body>
<main>
    <form action="inicio.php" method="get" class='inicio'>
        <h1>Apelido</h1>
        <input type="text" id="nome" name='nome'>
        <button type='submit'>Entrar</button>
    </form>
    <div id="rank">
        <h1>Rank</h1>
        <ul>
            <li><?php $sql = "SELECT * FROM nickname" ?></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</main>
</body>
</html>