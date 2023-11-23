<?php
// conexao com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '', 'quimico');

include_once "functions.php";
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header></header>
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
        <div>
            <form class="casa" action="get">
            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    <?php     echo($questoes[0]['RespostaCerta']); ?>
  </label>
<div>

            <form class="casa" action="get">
            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  <?php     echo($questoes[0]['RespostaErrada']); ?>
  </label>
</div>
<div>
            <form class="casa" action="get">
            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
  <?php     echo($questoes[0]['RespostaErrada2']); ?>
  </label>
</div>
</div>
<input type="submit" value="Enviar" id='Enviar' href="#">
</form></div>
<?php
  include_once "visual.php";
?>