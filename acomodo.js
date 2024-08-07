function mostrarImagen(imagen) {
    // Obtener la información de la imagen
    var informacion = imagen.nextElementSibling;

    console.log("Informacion:", informacion); // Verificar si la variable informacion se selecciona correctamente

    // Mostrar la información de la imagen clicada
    informacion.style.display = 'block';

    // Ocultar todas las miniaturas de imágenes
    var miniaturas = document.querySelectorAll('.miniatura');
    miniaturas.forEach(function(miniatura) {
        miniatura.style.display = 'none';
    });

    // Mostrar la imagen en grande
    var imagenGrande = document.createElement('img');
    imagenGrande.src = imagen.src;
    imagenGrande.classList.add('imagen-grande');
    document.body.appendChild(imagenGrande);

    // Escuchar el evento de clic en la imagen en grande para cerrarla
    imagenGrande.addEventListener('click', function(event) {
        // Verificar si el clic se realizó directamente en la imagen en grande
        if (event.target === imagenGrande) {
            document.body.removeChild(imagenGrande);
            // Ocultar la información de la imagen clicada
            informacion.style.display = 'none';
            // Mostrar nuevamente todas las miniaturas de imágenes
            miniaturas.forEach(function(miniatura) {
                miniatura.style.display = 'inline-block';
            });
        }
    });

    // Control de desplazamiento lateral
    var galeria = document.querySelector('.galeria');
    var scrollAmount = imagen.offsetLeft - (window.innerWidth / 2) + (imagen.offsetWidth / 2);
    galeria.scrollTo({
        left: scrollAmount,
        behavior: 'smooth'
    });
}
function toggleInformacion(img) {
    var informacion = img.nextElementSibling;
    informacion.style.display = (informacion.style.display === 'block') ? 'none' : 'block';
}
