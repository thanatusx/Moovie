//FUNÇÃO PARA A BARRA LATERAL

const menu = document.querySelector('.menu');
const NavMenu = document.querySelector('.nav-menu');

menu.addEventListener('click', function(){
    menu.classList.toggle('ativo');
    NavMenu.classList.toggle('ativo');
})


//IMAGEM DO POSTER
var spcposter = document.getElementById("poster");
var endgame = document.createElement("img");
endgame.src = "../images/endgame.jpg";
endgame.style.borderRadius = "5px";
spcposter.appendChild(endgame);


//SISTEMA DE AVALIAÇÃO
function selecionarEstrelas(numEstrelas) {
    const estrelas = document.getElementsByClassName('estrela');
    for (let i = 0; i < estrelas.length; i++) {
      if (i < numEstrelas) {
        estrelas[i].classList.add('destaque');
        
      } else {
        estrelas[i].classList.remove('destaque');
      }
    }
  }
  
function limparDestaque() {
    const estrelas = document.getElementsByClassName('estrela');
  
    for (let i = 0; i < estrelas.length; i++) {
      estrelas[i].classList.remove('destaque');
    }
  }

  function exibirBalao(button, conteudo) {
    const balao = document.getElementById('balao');
    balao.style.display = 'block';
    balao.innerText = conteudo;
  
    const buttonRect = button.getBoundingClientRect();
    const balaoRect = balao.getBoundingClientRect();
    const topPosition = buttonRect.top - balaoRect.height - 10;
    const leftPosition = buttonRect.left + (buttonRect.width - balaoRect.width) / 2;
  
    balao.style.top = topPosition + 'px';
    balao.style.left = leftPosition + 'px';
  
    balao.style.display = 'block';
  }
  
  function ocultarBalao() {
    const balao = document.getElementById('balao');
    balao.style.display = 'none';
  }