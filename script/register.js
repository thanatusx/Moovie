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