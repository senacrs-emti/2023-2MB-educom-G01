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
        <div>
            <form action="get">
                <ul id="conjunto_respostas">
                    <li class="resposta"><input type='checkbox'><label> opção 1</label></li>
                    <li class="resposta"><input type='checkbox'><label> opção 2</label></li>
                    <li class="resposta"><input type='checkbox'><label> opção 3</label></li>
                </ul>
                <input type="submit" value="Enviar" id='Enviar' href="">
                
            </form>
        </div>

<?php 
include_once"visual.php";
?>