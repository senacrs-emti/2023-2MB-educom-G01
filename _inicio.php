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
$sqlRanking = "SELECT * FROM usuario ORDER BY pontos DESC";
$resultado = $conexao->query($sqlRanking);
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
    <a href="./_index.php"><button>Começar</button></a>
    <div id="rank">
        <h1>Rank</h1>
        <table>
            <thead>
                <tr>
                    <th>Apelido</th>
                    <th>Pontos</th>
                    <th>Tempo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Exibir os resultados do ranking em uma tabela
                while ($linha = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $linha['Nickname'] . "</td>";
                    echo "<td>" . $linha['Pontos'] . "</td>";
                    echo "<td>" . $linha['Tempo'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>


<?php
// Fechar a conexão com o banco de dados
$conexao->close();
?>