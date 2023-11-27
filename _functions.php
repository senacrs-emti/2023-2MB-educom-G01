<?php 
//Gerador de inputs, classes e ID
function adicionarInput($string) {
  $palavras = explode(" ", $string);
  $id_atual = 1;
  $resultado = "";

  // cria a classe esquerda
  $classe = 'esquerda';
  $funcao = 'desenharEsquerda()';
  
  foreach ($palavras as $palavra) {

    $resultado .= "<input type='number' class='$classe' id='Atomo-$id_atual' onchange='$funcao'> " . $palavra;
    $id_atual++;

    //procura a posição da seta
    $posicao = strpos($palavra, "→");

    // altera o nome das classes
    if( is_numeric($posicao) || !empty($posicao) ){
      $classe = 'direita';
      $funcao = 'desenharDireita()';
    }
  }
  return $resultado;

}
// Consulta SQL para obter dados para o ranking
$sqlRanking = "SELECT * FROM usuario ORDER BY pontos DESC";
$resultado = $conexao->query($sqlRanking);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nome'])) {
  $nome = $_GET['nome'];

  // Executa a consulta SQL para inserir o nome no banco de dados
  $sqlInserir = "INSERT INTO usuario (Nickname) VALUES ('$nome')";
  if ($conexao->query($sqlInserir) === TRUE) {
      echo "Nome inserido com sucesso.";
  } else {
      echo "Erro ao inserir o nome: " . $conexao->error;
  }
}

function atualizarPontos($nome, $respostaCerta) {
  global $conexao;

  // Obtém o valor atual dos pontos do usuário
  $sql = "SELECT pontos FROM usuario WHERE Nickname = '$nome'";
  $resultado = $conexao->query($sql);
  $pontos = $resultado->fetch_assoc()['pontos'];

  // Atualiza os pontos do usuário
  if ($respostaCerta == 'RespostaCerta') {
    $pontos += 100;
  }

  $sql = "UPDATE usuario SET pontos = $pontos WHERE Nickname = '$nome'";
  $conexao->query($sql);
}



function pontos(){

}
?>