//IDENTIFICADOR DE ERRO VINDO DO PHP
window.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    if(error == 1){
        const userError = document.getElementById('user-error');
        userError.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }if(error == 2){
        const emailUser = document.getElementById('email-error');
        emailUser.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }if (error == 3){
        const sqlError = document.getElementById('sql-error');
        sqlError.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }if (error == 4){
        const emptyuser = document.getElementById('empty-error');
        emptyuser.style.display = 'block';
        history.replaceState(null, '', window.location.pathname);
    }if (error == 5){
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
        csenha.type = "text";
        this.setAttribute('name','eye-off-outline');
    }else{
        senha.type = "password";
        csenha.type = "password";
        this.setAttribute('name','eye-outline');
    }
}

const form = document.getElementById('form');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

function setError(index){
    campos[index].style.border = '2px solid #d00000';
    spans[index].style.display = 'block';
}

function removeError(index){
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}

function nameValidate(){
    if(campos[0].value.length < 3){
        setError(0);
    }else{
        removeError(0);
    }
}

function emailValidate(){
    if(!emailRegex.test(campos[1].value)){
        setError(1);
    }else{
        removeError(1);
    }
}

function mPasswordValidate(){
    if(campos[2].value.length < 8){
        setError(2);
    }else{
        removeError(2);
    }
}

function comparePassword(){
    if(campos[2].value == campos[3].value && campos[3].value.length >=8){
        removeError(3);
    }else{
        setError(3);
    }
}