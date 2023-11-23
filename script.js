const canvas_esquerda = document.getElementById("canvas_esquerda");
const context1 = canvas_esquerda.getContext("2d");

const canvas_direita = document.getElementById("canvas_direita");
const context2 = canvas_direita.getContext("2d");
let atomos = document.getElementsByClassName('esquerda').value;
function somarEsquerda() {
    let soma = 0;

    // Percorre todos os inputs
    for (let valores of atomos) {
      // Obtém o valor do input
      const valor = Number(atomos.value);
  
      // Adiciona o valor à soma
      soma += valor;
    }
  
    // Retorna a soma
    return soma;
  }
  console.log(soma)
  