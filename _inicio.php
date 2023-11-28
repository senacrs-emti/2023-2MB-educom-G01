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
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border: 2px solid black;
            z-index: 1000;
        }

        #fechar-popup {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
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
        <button id="abrir-popup">O que é balanceamento Quimico</button>
        <div id="popup">
        <div id="fechar-popup" onclick="fecharPopup()">X</div>
        <div id="texto-balanco">
        <h2>Balanceamento Químico</h2>
        <p>
O balanceamento químico é um conceito fundamental na química que se refere ao ajuste adequado das quantidades de reagentes e produtos em uma reação química. Uma equação química equilibrada garante que a quantidade de cada tipo de átomo seja a mesma nos reagentes e nos produtos, respeitando a lei da conservação da massa.</p>
        <p>A lei da conservação da massa, formulada por Antoine Lavoisier, estabelece que a massa total dos reagentes em uma reação química é igual à massa total dos produtos formados. Portanto, para cumprir essa lei, é necessário equilibrar a equação química, ajustando os coeficientes estequiométricos dos reagentes e produtos.</p>
        <p>Por exemplo, considere a equação química não balanceada da reação de formação da água a partir do hidrogênio e do oxigênio: <strong>H<sub>2</sub> + O<sub>2</sub> → H<sub>2</sub>O</strong></p>
        <p>Para equilibrar essa equação, adicionamos coeficientes estequiométricos adequados aos reagentes e produtos. Neste caso, a equação balanceada seria: <strong>2H<sub>2</sub> + O<sub>2</sub> → 2H<sub>2</sub>O</strong></p>
        <p>Isso indica que dois mol de moléculas de hidrogênio reagem com um mol de moléculas de oxigênio para produzir dois mol de moléculas de água, mantendo a conservação da massa.</p>
        <p>O balanceamento químico é crucial não apenas para obedecer às leis fundamentais da química, mas também para determinar corretamente as proporções em que os reagentes reagem e os produtos são formados. Essa prática é essencial em vários contextos, desde laboratórios químicos até processos industriais, garantindo a precisão e eficiência nas reações químicas.</p>
    </div>
    </div>
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
<script>
    // Função para abrir o popup
    function abrirPopup() {
        document.getElementById("popup").style.display = "block";
    }

    // Função para fechar o popup
    function fecharPopup() {
        document.getElementById("popup").style.display = "none";
    }

    // Atribuir a função ao botão de abrir o popup
    document.getElementById("abrir-popup").addEventListener("click", abrirPopup);
</script>
</body>
</html>


<?php
// Fechar a conexão com o banco de dados
$conexao->close();
?>
