const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');

let NumeroAtomos = document.getElementById("NumeroAtomico").value;

// Adiciona o manipulador de eventos
document.getElementById("NumeroAtomico").addEventListener('change', function() {
  // Limpa o canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Atualiza o valor de NumeroAtomos
  NumeroAtomos = this.value;

  // Chama a função CriarAtomo()
  CriarAtomo();
});

function CriarAtomo(){
  for (let i = 0; i < NumeroAtomos; i++) {
    ctx.beginPath();
    ctx.arc(Math.random() * canvas.width, Math.random() * canvas.height, 5, 0, 2 * Math.PI);
    ctx.fillStyle = 'red';
    ctx.fill();
  }
}
