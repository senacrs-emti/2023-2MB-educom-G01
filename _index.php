<?php

include_once "_conexao.php";
include_once "_functions.php";
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Balanceador quimico</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <a href="./_inicio.php"><button class="botao-inicio">Inicio</button></a>
    <div id="pontos"><p>Pontuação:<?php $sql = "SELECT Pontos FROM usuario where nickname='$nome'" ?></p></div>
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
        $opcoes = array($questoes[0]['RespostaErrada2'], $questoes[0]['RespostaErrada'], $questoes[0]['RespostaCerta']);
        foreach ($opcoes as $value) {
        ?>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              <?php echo "$value <br>"; ?>
            </label>
          </div>
        <?php
        }
        ?>       
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