window.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    if(error == 1){
        const emptyError = document.getElementById('empty-error');
        emptyError.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }if(error == 2){
        const userError = document.getElementById('user-error');
        userError.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }if (error == 3){
        const passwordError = document.getElementById('password-error');
        passwordError.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }
});

let showPassword = document.getElementById("eye");
let senha = document.getElementById("senha");
let csenha = document.getElementById("confirmarsenha");

showPassword.onclick = function(){
    if(senha.type == "password"){
        senha.type = "text";
        this.setAttribute('name','eye-off-outline');
    }else{
        senha.type = "password";
        this.setAttribute('name','eye-outline');
    }
}