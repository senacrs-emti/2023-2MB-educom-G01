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
            <h1><input type="number" id="NumeroDeAtomos1" name="NumeroDeAtomos1" min='1' value="1">H20 ->  <input type="number" id="NumeroDeAtomos2" name="NumeroDeAtomos2" min='1' value="1">H + <input type="number" id="NumeroDeAtomos3" name="NumeroDeAtomos3" min='0'>O2</h1>
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
                <input type="submit" value="Enviar" id='Enviar' href="#">
                
            </form>
        </div>

<?php 
include_once"visual.php";
?>