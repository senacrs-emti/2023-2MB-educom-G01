const canvas_esquerda = document.getElementById("canvas_esquerda");
const context1 = canvas_esquerda.getContext("2d");

const canvas_direita = document.getElementById("canvas_direita");
const context2 = canvas_direita.getContext("2d");

let atomos = document.getElementsByClassName('esquerda')
let botao = document.getElementById(botao);
if(botao.pressed){
  console.log(atomos);
}
  