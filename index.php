<?php

include_once "conexao.php"
include_once "functions.php";
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Balanceador quimico</title>
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
    <script>

    </script>

        <div class="alternativas">
        <div>
            <form action="post" action="">
            <?php
            $opcoes=array($questoes[0]['RespostaErrada2'], $questoes[0]['RespostaErrada'], $questoes[0]['RespostaCerta']);
            array_rand($opcoes);
            //echo '<pre>';
            //print_r($opcoes);
            //echo '</pre>';
            ?>

            <?php
            $opcoes=array($questoes[0]['RespostaErrada2'], $questoes[0]['RespostaErrada'], $questoes[0]['RespostaCerta']);
            foreach ($opcoes as $value){
            ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                <?php echo "$value <br>";?>
                </label>
              <div>
            <?php  
            }
            ?>
            <input type="submit" value="Enviar" id='Enviar' href="http://localhost:8080/2023-2MB-educom-G01/index.php">
            </form>
</div>
         <?php
            include_once "visual.php";
            ?>

