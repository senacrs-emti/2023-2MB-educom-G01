<?php
include_once('_conexao.php');

include_once('_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balanceador Quimico</title>
    <style>
        body{
            background-color: RGB(142, 209, 177);
        }
        #bloco-entrar{
            display:flex;
            align-items:center;
            flex-direction:column;
        }
        form{
            display:flex;
            align-items:center;
            flex-direction:column;
            margin:5px;
        }
        #bloco-ranking{
            display:flex;
            align-items:center;
            flex-direction:column;
        }
        #rank{
            width:70%;
            height:200px;
            border: solid 1px black;
        }
        .linhas{
            border: solid 1px black;
            font-size:25px;
        }
        .cabecalho{
            background-color: gray;
        }
    </style>
</head>
<body>
<main>
    <div id='bloco-entrar'>
        <form action="_inicio.php" method="get" class='inicio'>
            <h1>Apelido</h1>
            <input type="text" id="nome" name='nome'>
            <button type='submit'>Entrar</button>
        </form>
        <a href="./_index.php?nome=<?php echo $nome; ?>"><button>Começar</button></a>
    </div>
    <div id="bloco-ranking">
        <h1>Rank</h1>
        <table id="rank">
            <thead>
                <tr>
                    <th class="cabecalho">Apelido</th>
                    <th class="cabecalho">Pontos</th>
                    <th class="cabecalho">Tempo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Exibir os resultados do ranking em uma tabela
                while ($linha = $resultado ->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='linhas'>" . $linha['Nickname'] . "</td>";
                    echo "<td class='linhas'>" . $linha['Pontos'] . "</td>";
                    echo "<td class='linhas'>" . $linha['Tempo'] . "</td>";
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
