function validarSenha() {
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmarsenha").value;
    if (senha !== confirmarSenha) {
      const csenhaError = document.getElementById('senha-error');
      csenhaError.style.display = 'block';
      return false;
    }
    return true;
  }

window.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    if(error == 1){
        const userError = document.getElementById('user-error');
        userError.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }
    if(error == 2){
        const emailUser = document.getElementById('email-error');
        emailUser.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }
    if (error == 3){
        const sqlError = document.getElementById('sql-error');
        sqlError.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }
});

let showPassword = document.getElementById("eye");
let senha = document.getElementById("senha");

showPassword.onclick = function(){
    if(senha.type == "password"){
        senha.type = "text";
        this.setAttribute('name','eye-off-outline');
    }else{
        senha.type = "password";
        this.setAttribute('name','eye-outline');
    }
}

const form = document.getElementById('form');
const campos = document.querySelectorAll('.required')