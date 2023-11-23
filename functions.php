<?php 
function adicionarInput($string) {
  $palavras = explode(" ", $string);
  $id_atual = 1;
  $resultado = "";

  // cria a classe esquerda
  $classe = 'esquerda';
  
  foreach ($palavras as $palavra) {

    $resultado .= "<input type='number' class='$classe' id='Atomo-$id_atual' onchange='desenharCirculosAleatorios()'> " . $palavra;
    $id_atual++;

    //procura a posição da seta
    $posicao = strpos($palavra, "→");

    // altera o nome das classes
    if( is_numeric($posicao) || !empty($posicao) ){
      $classe = 'direita';
    }
  }
  return $resultado;

}
?>