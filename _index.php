<?php
include_once "_conexao.php";
include_once "_functions.php";

// Verifica se o parâmetro 'nome' está presente na URL
if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
} else {
    // Se o parâmetro 'nome' não estiver presente, redireciona para a página inicial
    header("Location: ./_inicio.php");
    exit();
}
?>

<html lang="Pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Balanceador quimico</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <a href="./_inicio.php"><button class="botao-inicio">Inicio</button></a>
    <p>Pontuação:
    <?php
    $sqlPontuacao = "SELECT Pontos FROM usuario WHERE nickname='$nome'";
    $resultadoPontuacao = mysqli_query($conexao, $sqlPontuacao);
    $pontuacao = mysqli_fetch_assoc($resultadoPontuacao)['Pontos'];
    echo $pontuacao;
    ?>
    </p>
    <button id="openPopupButton">Ajuda</button>
  </header>
  <main>
  <div id="popupContainer" class="popup-container">
      <div class="popup-content">
        <span class="close-popup" onclick="fecharPopup()">&times;</span>
        <h1>Como jogar:</h1>
        <p>O jogo é simples, você deve apenas fazer o balanceamento químico da equação apresentada. <br>Para isso, o jogo contém blocos que podem ser preenchidos com números que multiplicam a quantidade de moléculas. <br>Você pode ver a quantidade de moléculas no canvas a baixo das opções de resposta.</p>
      </div>
    </div>
    <div class="questao">
      <h1><?php // Procura e seleciona as questões
          $sql = "SELECT * FROM questoes inner join respostas on questoes.Respostas_id=respostas.id ORDER BY RAND() LIMIT 1";
          $resultado = mysqli_query($conexao, $sql);

          // guarda as questões
          $questoes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

          // Escreve a questão 
          echo adicionarInput($questoes[0]['equacao']); ?>
      </h1>
    </div>
    <div class="alternativas">
      <form class="casa" method="post" action="">
        <?php
        $opcoes = array($questoes[0]['RespostaErrada2'], $questoes[0]['RespostaErrada'], $questoes[0]['RespostaCerta']);
        array_rand($opcoes);
        //echo '<pre>';
        //print_r($opcoes);
        //echo '</pre>';
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['flexRadioDefault'])) {
            // Obtém a resposta selecionada pelo usuário
            $respostaSelecionada = $_POST['flexRadioDefault'];
        
            // Obtém a questão atual e suas respostas do banco de dados
            $sql = "SELECT * FROM questoes INNER JOIN respostas ON questoes.Respostas_id = respostas.id ORDER BY RAND() LIMIT 1";
            $resultado = mysqli_query($conexao, $sql);
            $questaoAtual = mysqli_fetch_assoc($resultado);
        
            // Verifica se a resposta selecionada está correta
            $respostaCerta = ($respostaSelecionada == $questaoAtual['RespostaCerta']) ? 'RespostaCerta' : '';
        
            // Chama a função para atualizar os pontos
            atualizarPontos($nome, $respostaCerta);
        
            // Redireciona para a próxima questão ou página
            if ($respostaCerta == '') {
                // Se a resposta estiver incorreta, exibe o popup
                echo "<script>alert('Você errou!');</script>";
                header("Location: ./derrota.php");

            } else {
                // Se a resposta estiver correta, redireciona para a próxima questão
                header("Location: ./_index.php?nome=$nome");
               
            }
        } 
        foreach ($opcoes as $value) {
        ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              <?php echo "$value <br>"; ?>
            </label>
          </div>
        <?php } ?>       
    </div>
    <a href="./_index.php"><button  id='Enviar'>Próxima</button></a>
    </form>          
    </div>

    <script>
      function abrirPopup() {
  document.getElementById('popupContainer').style.display = 'block';
}

// Função para fechar o Popup
function fecharPopup() {
  document.getElementById('popupContainer').style.display = 'none';
}

// Associando a função de abrir ao botão
document.getElementById('openPopupButton').addEventListener('click', abrirPopup);

    </script>
    <?php
    include_once "_visual.php";
    ?>