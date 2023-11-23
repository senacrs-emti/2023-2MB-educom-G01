const canvas_esquerda = document.getElementById("canvas_esquerda");
const context1 = canvas_esquerda.getContext("2d");

const canvas_direita = document.getElementById("canvas_direita");
const context2 = canvas_direita.getContext("2d");

  // Inicializa a variável soma
  var soma = 0; 

function somarValores() {
  // Obtém todos os elementos com a classe 'esquerda'
  let elementosEsquerda = document.querySelectorAll('.esquerda');

  // Itera sobre os elementos e adiciona seus valores à soma
  elementosEsquerda.forEach(function(elemento) {
      soma += parseFloat(elemento.value) || 0; // Converte o valor para número e trata casos de valores não numéricos
  });

  // Exibe o resultado no console ou em outro lugar, dependendo do que você deseja fazer
  console.log(soma);
}

function desenharCirculosAleatorios() {
  context1.clearRect(0, 0, canvas_esquerda.width, canvas_esquerda.height); // Limpa o canvas

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