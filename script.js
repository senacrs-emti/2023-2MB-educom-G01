function desenharMoleculas(equacao, canvasReagentes, canvasProdutos) {
  // Separa a equação em reagentes e produtos
  const reagentes = equacao.split("->")[0].split(" ");
  const produtos = equacao.split("->")[1].split(" ");

  // Itera sobre os reagentes
  reagentes.forEach((reagente, i) => {
    // Obtém o número de moléculas do reagente
    const numeroMoleculas = document.getElementById(`reagente-${i + 1}`).value;

    // Desenha as moléculas do reagente
    for (let j = 0; j < numeroMoleculas; j++) {
      desenharMolecula(reagente, canvasReagentes);
    }
  });

  // Itera sobre os produtos
  produtos.forEach((produto, i) => {
    // Obtém o número de moléculas do produto
    const numeroMoleculas = document.getElementById(`produto-${i + 1}`).value;

    // Desenha as moléculas do produto
    for (let j = 0; j < numeroMoleculas; j++) {
      desenharMolecula(produto, canvasProdutos);
    }
  });
}

function desenharMolecula(molecula, canvas) {
  // Obtém o elemento da molécula
  const elemento = molecula.split(" ")[0];

  // Obtém o número de átomos do elemento
  const numeroAtomos = molecula.split(" ")[1];

  // Desenha os átomos da molécula
  for (let i = 0; i < numeroAtomos; i++) {
    const x = Math.floor(Math.random() * canvas.width);
    const y = Math.floor(Math.random() * canvas.height);
    canvas.getContext("2d").beginPath();
    canvas.getContext("2d").fillStyle = `#${elemento}`;
    canvas.getContext("2d").arc(x, y, 10, 0, 2 * Math.PI);
    canvas.getContext("2d").fill();
  }
}
