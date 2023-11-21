<?php 
function adicionarInput($string) {
  $palavras = explode(" ", $string);
  $id_atual = 1;
  $resultado = "";
  foreach ($palavras as $palavra) {
    $resultado .= "<input type='number' id='Atomo-$id_atual'> " . $palavra;
    $id_atual++;
  }
  return $resultado;
}
?>