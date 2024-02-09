window.addEventListener('DOMContentLoaded', (event) => {
  const urlParams = new URLSearchParams(window.location.search);
  const error = urlParams.get('error');
  if (error == '1') {
    const errorMessage = document.getElementById('error-message');
    errorMessage.style.display = 'block';
    history.replaceState(null, '', window.location.pathname);
  }
});

