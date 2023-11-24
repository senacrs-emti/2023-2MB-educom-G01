<?php
include_once('_conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nome'])) {
    $nome = $_GET['nome'];

    // Executa a consulta SQL para inserir o nome no banco de dados
    $sqlInserir = "INSERT INTO usuario (Nickname) VALUES ('$nome')";
    if ($conexao->query($sqlInserir) === TRUE) {
        echo "Nome inserido com sucesso.";
    } else {
        echo "Erro ao inserir o nome: " . $conexao->error;
    }
}

// Consulta SQL para obter dados para o ranking
$sqlRanking = "SELECT * FROM usuario";
$resultado = $conexao->query($sqlRanking);

// Fechar a conexão com o banco de dados
$conexao->close();
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
    <form action="_inicio.php" method="get" class='inicio'>
        <h1>Apelido</h1>
        <input type="text" id="nome" name='nome'>
        <button type='submit'>Entrar</button>
    </form>
    <div id="rank">
        <h1>Rank</h1>
        <ul>
            <?php
            // Exibir os resultados do ranking
            while ($linha = $resultado->fetch_assoc()) {
                echo "<li>" . $linha['Nickname'] . "</li>";
            }
            ?>
        </ul>
    </div>
</main>
</body>
</html>
