document.getElementById('fileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var preview = document.getElementById('preview');

    if (file) {
        var reader = new FileReader();

        reader.onload = function(event) {
            var img = document.createElement('img');
            img.src = event.target.result;
            preview.innerHTML = '';
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '<img src="images/pfp/user.jpg" alt="Imagem Padrão" width="300" height="300">';
    }
});