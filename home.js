//FUNÇÃO PARA A BARRA LATERAL

const menu = document.querySelector('.menu');
const NavMenu = document.querySelector('.nav-menu');

menu.addEventListener('click', () => {
    menu.classList.toggle('ativo');
    NavMenu.classList.toggle('ativo');
})

//============FILMES POPULARES============

//funções dos filmes populares

function over(){ //Quando o mouse entrar no poster, ele tera um destaque branco em volta
  this.style.border = "3px solid white";
  this.style.transition = "0.1s"
};

function out() { //Quando o mouse sair do poster o destaque desaparecerá;
  this.style.border = "none";
}

function click(filme){ //Encaminha o usuário para a página do filme clicado
    var endereco = "filmes/" + filme + ".html";
    window.location.href = endereco;
}

//=================

//Poster Avengers Endgame
var spcpostereg = document.getElementById("endgame");
var endgame = document.createElement("img");
endgame.src = "images/endgame.jpg";
endgame.style.borderRadius = "5px";
spcpostereg.appendChild(endgame);
endgame.addEventListener("mouseover",over);
endgame.addEventListener('mouseout', out);
endgame.addEventListener('click', function(){ click("endgame") });


//Poster Sound of Metal
var spcpostersm = document.getElementById("soundofmetal");
var soundofmetal = document.createElement("img");
soundofmetal.src = "images/soundofmetal.jpg";
soundofmetal.style.borderRadius = "5px";
spcpostersm.appendChild(soundofmetal);
soundofmetal.addEventListener("mouseover",over);
soundofmetal.addEventListener('mouseout', out);
soundofmetal.addEventListener('click', function(){ click("soundofmetal") });

//Poster Whiplash
var spcposterwp = document.getElementById("whiplash");
var whiplash = document.createElement("img");
whiplash.src = "images/whiplash.jpg";
whiplash.style.borderRadius = "5px";
spcposterwp.appendChild(whiplash);
whiplash.addEventListener("mouseover",over);
whiplash.addEventListener('mouseout', out);
whiplash.addEventListener('click',  function(){ click("whiplash") });

//Poster The Royals Tenenbaums
var spcposterrt = document.getElementById("royaltenenbaums");
var royaltenenbaums = document.createElement("img");
royaltenenbaums.src = "images/royaltenenbaums.jpg";
royaltenenbaums.style.borderRadius = "5px";
spcposterrt.appendChild(royaltenenbaums);
royaltenenbaums.addEventListener("mouseover",over);
royaltenenbaums.addEventListener('mouseout', out);
royaltenenbaums.addEventListener('click',  function(){ click("royaltenenbaums") });

//Poster The Suicide Squad
var spcpostersq = document.getElementById("suicidesquad");
var suicidesquad = document.createElement("img");
suicidesquad.src = "images/suicidesquad.jpg";
suicidesquad.style.borderRadius = "5px";
spcpostersq.appendChild(suicidesquad);
suicidesquad.addEventListener("mouseover",over);
suicidesquad.addEventListener('mouseout', out);
suicidesquad.addEventListener('click',  function(){ click("suicidesquad") });

//Poster Midsommar
var spcposterms = document.getElementById("midsommar");
var midsommar = document.createElement("img");
midsommar.src = "images/midsommar.jpg";
midsommar.style.borderRadius = "5px";
spcposterms.appendChild(midsommar);
midsommar.addEventListener("mouseover",over);
midsommar.addEventListener('mouseout', out);
midsommar.addEventListener('click', function(){ click("midsommar") });

/*
var spcposterml = document.getElementById("moonlight");
var moonlight = document.createElement("img");
moonlight.src = "images/moonlight.jpg";
moonlight.style.borderRadius = "10px";
spcposterml.appendChild(moonlight);
moonlight.addEventListener("mouseover", function() {
  moonlight.style.border = "0.01px solid gray";
  moonlight.style.transition = "0.3"
  });
  moonlight.addEventListener("mouseout", function() {
    moonlight.style.border = "none";
});
moonlight.onclick = function() {
    window.location.href = "filmes.html";
};
*/