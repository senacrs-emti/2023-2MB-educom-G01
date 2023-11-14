let NumeroAtomos1 = 1;
let NumeroAtomos2 = 1;
let NumeroAtomos3 = 1;

const canvas1 = document.querySelector('#representacao canvas:first-child');
const ctx1 = canvas1.getContext('2d');

const canvas2 = document.querySelector('#representacao canvas:last-child');
const ctx2 = canvas2.getContext('2d');

// Adiciona os manipuladores de eventos
document.getElementById("NumeroDeAtomos1").addEventListener('change', function() {
  NumeroAtomos1 = this.value;
  CriarAtomo(ctx1, NumeroAtomos1);
});

document.getElementById("NumeroDeAtomos2").addEventListener('change', function() {
  NumeroAtomos2 = this.value;
  CriarAtomo(ctx2, NumeroAtomos2);
});

document.getElementById("NumeroDeAtomos3").addEventListener('change', function() {
  NumeroAtomos3 = this.value;
  CriarAtomo(ctx2, NumeroAtomos3);
});

function CriarAtomo(ctx, NumeroAtomos) {
  for (let i = 0; i < NumeroAtomos; i++) {
    ctx.beginPath();
    ctx.arc(Math.random() * ctx.canvas.width, Math.random() * ctx.canvas.height, 5, 0, 2 * Math.PI);
    ctx.fillStyle = 'red';
    ctx.fill();
  }
}
