const canvas1 = document.getElementById('canvas1');
const ctx1 = canvas1.getContext('2d');

const canvas2 = document.getElementById('canvas2');
const ctx2 = canvas2.getContext('2d');

const canvas3 = document.getElementById('canvas3');
const ctx3 = canvas3.getContext('2d');

let NumeroAtomos1 = document.getElementById('NumeroAtomico1').value;
let NumeroAtomos2 = document.getElementById('NumeroAtomico2').value;
let NumeroAtomos3 = document.getElementById('NumeroAtomico3').value;

document.getElementById('NumeroAtomico1').addEventListener('change', function () {
  // Limpa o canvas
  ctx1.clearRect(0, 0, canvas1.width, canvas1.height);
  NumeroAtomos1 = this.value;
  CriarAtomo(NumeroAtomos1, ctx1);
});

document.getElementById('NumeroAtomico2').addEventListener('change', function () {
  ctx2.clearRect(0, 0, canvas2.width, canvas2.height);
  NumeroAtomos2 = this.value;
  CriarAtomo(NumeroAtomos2, ctx2);
});

document.getElementById('NumeroAtomico3').addEventListener('change', function () {
  ctx3.clearRect(0, 0, canvas3.width, canvas3.height);
  NumeroAtomos3 = this.value;
  CriarAtomo(NumeroAtomos3, ctx3);
});

function CriarAtomo(NumeroAtomos, ctx) {
  for (let i = 0; i < NumeroAtomos; i++) {
    ctx.beginPath();
    ctx.arc(Math.random() * ctx.canvas.width, Math.random() * ctx.canvas.height, 5, 0, 2 * Math.PI);
    ctx.fillStyle = 'red';
    ctx.fill();
  }
}
