//FUNÇÃO PARA A BARRA LATERAL

const menu = document.querySelector('.menu');
const NavMenu = document.querySelector('.nav-menu');

menu.addEventListener('click', () => {
    menu.classList.toggle('ativo');
    NavMenu.classList.toggle('ativo');
})

var inputFoto = document.getElementById('foto');
var imagemPerfil = document.getElementById('imagem-perfil');

inputFoto.addEventListener('change', function() {
  if (inputFoto.files && inputFoto.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      imagemPerfil.src = e.target.result;
      localStorage.setItem('imagemPerfil', e.target.result);
    };

    reader.readAsDataURL(inputFoto.files[0]);
  }
});

var imagemSalva = localStorage.getItem('imagemPerfil');
if (imagemSalva) {
  imagemPerfil.src = imagemSalva;
}