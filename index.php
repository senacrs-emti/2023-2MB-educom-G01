

<!DOCTYPE html>
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
            <h1><input type="number" id="NumeroAtomico" name="NumeroAtomico" min='1' value="1">H20 ->  <input type="number" id="NumeroAtomico" min='1' value="1">H + <input type="number" id="NumeroAtomico" min='0'>O2</h1>
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

     
    </main>
    <footer></footer>
</body>
</html>
<?php 
include_once"visual.php";
?>