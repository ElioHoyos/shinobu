function showFullScreen(img) {
    // Obtener la imagen principal
    var mainImg = img.closest('figure').querySelector('img.grayscale');
  
    // Crear un nuevo elemento para la vista en pantalla completa
    var fullScreenImg = document.createElement('div');
    fullScreenImg.style.position = 'fixed';
    fullScreenImg.style.top = '0';
    fullScreenImg.style.left = '0';
    fullScreenImg.style.width = '100%';
    fullScreenImg.style.height = '100%';
    fullScreenImg.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    fullScreenImg.style.display = 'flex';
    fullScreenImg.style.justifyContent = 'center';
    fullScreenImg.style.alignItems = 'center';
    fullScreenImg.style.zIndex = '9999';
  
    // Crear un elemento de imagen dentro del contenedor
    var img = document.createElement('img');
    img.src = mainImg.src;
    img.style.maxWidth = '90%';
    img.style.maxHeight = '90%';
  
    // Agregar la imagen al contenedor
    fullScreenImg.appendChild(img);
  
    // Agregar el contenedor al div "fullScreenContainer"
    var fullScreenContainer = document.getElementById('fullScreenContainer');
    fullScreenContainer.appendChild(fullScreenImg);
    fullScreenContainer.style.position = 'fixed';
    fullScreenContainer.style.top = '0';
    fullScreenContainer.style.left = '0';
    fullScreenContainer.style.width = '100vw';
    fullScreenContainer.style.height = '100vh';
    fullScreenContainer.style.zIndex = '9999';
  
    // Cierre de la vista en pantalla completa al hacer clic fuera de la imagen
    fullScreenImg.addEventListener('click', function(e) {
      if (e.target === this) {
        fullScreenContainer.removeChild(this);
        fullScreenContainer.style.position = '';
        fullScreenContainer.style.top = '';
        fullScreenContainer.style.left = '';
        fullScreenContainer.style.width = '';
        fullScreenContainer.style.height = '';
        fullScreenContainer.style.zIndex = '';
        // Actualizar la página
        location.reload();
      }
    });
  }