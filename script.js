const canvas_esquerda = document.getElementById("canvas_esquerda");
const context1 = canvas_esquerda.getContext("2d");

const canvas_direita = document.getElementById("canvas_direita");
const context2 = canvas_direita.getContext("2d");

function desenharEsquerda() {
  // Limpa o canvas
  context1.clearRect(0, 0, canvas_esquerda.width, canvas_esquerda.height);

  // Inicializa a variável soma
  let soma = 0;

  // Obtém todos os elementos com a classe 'esquerda'
  let elementosEsquerda = document.querySelectorAll('.esquerda');

  // Itera sobre os elementos e adiciona seus valores à soma
  elementosEsquerda.forEach(function(elemento) {
    soma += parseFloat(elemento.value) || 0; // Converte o valor para número e trata casos de valores não numéricos
  });

  // Exibe o resultado no console ou em outro lugar, dependendo do que você deseja fazer
  console.log(soma);

  // Desenha os círculos com base na soma
  for (let i = 0; i < soma; i++) {
    let x = Math.random() * canvas_esquerda.width;
    let y = Math.random() * canvas_esquerda.height;
    let raio = 5;

    context1.beginPath();
    context1.arc(x, y, raio, 0, 2 * Math.PI);
    context1.fillStyle = 'red';
    context1.fill();
    context1.stroke();
    context1.closePath();
  }
}
function desenharDireita() {
  // Limpa o canvas
  context2.clearRect(0, 0, canvas_direita.width, canvas_direita.height);

  // Inicializa a variável soma
  let soma2 = 0;

  // Obtém todos os elementos com a classe 'esquerda'
  let elementosDireita = document.querySelectorAll('.direita');

  // Itera sobre os elementos e adiciona seus valores à soma
  elementosDireita.forEach(function(elemento) {
    soma2 += parseFloat(elemento.value) || 0; // Converte o valor para número e trata casos de valores não numéricos
  });

  // Exibe o resultado no console ou em outro lugar, dependendo do que você deseja fazer
  console.log(soma2);

  // Desenha os círculos com base na soma
  for (let i = 0; i < soma2; i++) {
    let x = Math.random() * canvas_direita.width;
    let y = Math.random() * canvas_direita.height;
    let raio = 5;

    context2.beginPath();
    context2.arc(x, y, raio, 0, 2 * Math.PI);
    context2.fillStyle = 'red';
    context2.fill();
    context2.stroke();
    context2.closePath();
  }
}