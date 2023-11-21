<?php
function adicionar_1_antes_de_cada_palavra($string) {
  $palavras = explode(" ", $string);
  $resultado = "";
  foreach ($palavras as $palavra) {
    $resultado .= "<input type='number'> " . $palavra;
  }
  return $resultado;
}
?>