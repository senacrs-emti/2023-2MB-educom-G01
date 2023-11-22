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
          $sql = "SELECT * FROM questoes";
          $resultado = mysqli_query($conexao, $sql);

          // guarda as questões
          $questoes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

          // Escolhe uma questão aleatoriamente
          $indice_aleatorio = array_rand($questoes);
          $questao = $questoes[$indice_aleatorio];
          // Escreve a questão 

          echo adicionarInput($questao['equacao']); ?>
      </h1>
    </div>
    <div class="alternativas">
      <div>
        <form action="get">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              opção 1
            </label>
            <div>
              <form action="get">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    opção 2
                  </label>
                </div>
                <div>
                  <form action="get">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        opção 3
                      </label>
                    </div>
                </div>
        <div class="alternativas">
        <div>
            <form action="get">
            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    <?php // Procura e seleciona as respostas
              $sql = "SELECT * FROM respostas";
              $opcao = mysqli_query($conexao, $sql);

              // 
              $escolheResposta = mysqli_fetch_all($opcao, MYSQLI_ASSOC);

              // Escolhe uma resposta aleatoriamente
              $indice_aleatorio = array_rand($escolheResposta);
              $escolheResposta = $escolheResposta[$indice_aleatorio];
              // Escreve a resposta 
              
              echo($escolheResposta['RespostaCerta']); ?>
  </label>
<div>
            <form action="get">
            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    opção 2
  </label>
</div>
<div>
            <form action="get">
            <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    opção 3
  </label>
</div>
</div>
<input type="submit" value="Enviar" id='Enviar' href="#">
</form></div>
         <?php
            include_once "visual.php";
            ?>