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
        //echo '<pre>'
        array_rand($opcoes)
        //print_r($opcoes);
        //echo '</pre>';
        ?>
        <?php
foreach ($opcoes as $indice => $value) {
    ?>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="opcao" id="flexRadioDefault<?php echo $indice + 1; ?>" value="<?php echo $indice; ?>" data-resposta="<?php echo ($indice === 'RespostaCerta') ? 'certo' : 'errado'; ?>">
        <label class="form-check-label" for="flexRadioDefault<?php echo $indice + 1; ?>">
            <?php echo $value; ?>
        </label>
    </div>
    <?php
}
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica se o campo 'opcao' está definido no array $_POST
  if (isset($_POST['opcao'])) {
      // Obtém o valor selecionado
      $opcaoSelecionada = $_POST['opcao'];

      // Obtém a resposta correta associada à opção selecionada
      $respostaCorreta = 'RespostaCerta';
      $respostaCorretaValor = array_search($respostaCorreta, $opcoes);

      // Verifica se a opção selecionada é a resposta correta
      if ($opcaoSelecionada == $respostaCorretaValor) {
          echo "Parabéns! Você acertou!";
          atualizarPontos($nome, $respostaCorreta);
      } else {
          echo "Ops! Você errou.";
          header("Location: ./_inicio.php");
          exit(); // Certifique-se de sair após o redirecionamento para evitar execução adicional
      }
  } else {
      echo "Nenhuma opção selecionada";
  }
} else {
  echo "O formulário não foi submetido";
}
?> 
    </div>
    <button  id='Enviar'>Próxima</button>
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