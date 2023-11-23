const canvas_esquerda = document.getElementById("canvas_esquerda");
const context1 = canvas_esquerda.getContext("2d");

const canvas_direita = document.getElementById("canvas_direita");
const context2 = canvas_direita.getContext("2d");

function somarEsquerda() {
    let soma = 0;
    let input = document.getElementsByClassName('esquerda').value;
    // Percorre todos os inputs
    for (let valores of input) {
      // Obtém o valor do input
      const valor = Number(input.value);
  
      // Adiciona o valor à soma
      soma += valor;
    }
  
    // Retorna a soma
    return soma;
  }
  console.log(soma)
  