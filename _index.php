<?php
include_once "_conexao.php";
include_once "_functions.php";

?>

<html lang="Pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Balanceador químico</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <div  class="dhl"><a href="./_inicio.php"><button class="botao">inicio</button></a></div>
    
    <div class="dhl"><button id="openPopupButton" class="botao">Ajuda</button></div>
  <div id="popupContainer" class="popup-container">
      <div class="popup-content">
        <span class="close-popup" onclick="fecharPopup()">&times;</span>
        <h1>Como jogar:</h1>
        <p>O jogo é simples, você deve apenas fazer o balanceamento químico da equação apresentada. <br>Para isso, o jogo contém blocos que podem ser preenchidos com números que multiplicam a quantidade de moléculas. <br>Você pode ver a quantidade de moléculas no canvas abaixo das opções de resposta.</p>
      </div>
    </div>
    <br>
    <div class="dh"> <p>Pontuação:
    <?php
    $sqlPontuacao = "SELECT Pontos FROM usuario WHERE nickname='$nome'";
    $resultadoPontuacao = mysqli_query($conexao, $sqlPontuacao);
    $pontuacao = mysqli_fetch_assoc($resultadoPontuacao)['Pontos'];
    echo $pontuacao;
    ?>
    </p></div>
  </header>
  <main>
  
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
    <?php 
      $opcoes = array($questoes[0]['RespostaErrada2'], $questoes[0]['RespostaErrada'], $questoes[0]['RespostaCerta']);
      shuffle($opcoes);
    ?>
      <form action="_index.php" method="post">
      <?php foreach ($opcoes as $indice => $value) {
      $tipoResposta = array_search($value, $questoes[0]);
        // Marca o botão de opção correto
        $checked = ($tipoResposta === 'RespostaCerta') ? 'checked' : '';
    
        echo "<label for='opcao$indice'>$value</label>";
        echo "<input type='radio' name='opcao' id='opcao$indice' value='$tipoResposta' $checked>";
      }
      ?>
      <button type="submit">Verificar Resposta</button>
      </form>
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $respostaUsuario = isset($_POST['opcao']) ? $_POST['opcao'] : '';

          if ($respostaUsuario === 'RespostaCerta') {
              echo 'Resposta correta!';
          } else {
              echo 'Resposta errada. Tente novamente.';
          }
      }
      ?>
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
</body>
</html>
