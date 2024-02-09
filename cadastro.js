function validarSenha() {
  var senha = document.getElementById("senha").value;
  var confirmarSenha = document.getElementById("confirmarSenha").value;
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
  if (error == '1') {
    const userError = document.getElementById('user-error');
    userError.style.display = 'block';
    history.replaceState(null, '', window.location.pathname);
  }
  if (error == '2') {
    const emailUser = document.getElementById('email-error');
    emailUser.style.display = 'block';
    history.replaceState(null, '', window.location.pathname);
  }
});