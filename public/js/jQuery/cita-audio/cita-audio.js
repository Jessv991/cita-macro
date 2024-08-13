//styleMap = 'mapbox://styles/mapbox/streets-v11';

$(document).ready(function () {
    var $imgs = $('.carrusel-inner img');
    var index = 0;
    setInterval(function () {
        // Ocultar imagen actual
        $imgs.eq(index).removeClass('active');

        // Calcular el índice de la siguiente imagen circularmente
        index = (index + 1) % $imgs.length;

        // Mostrar la siguiente imagen
        $imgs.eq(index).addClass('active');
    }, 3000); // Cambiar de imagen cada 3 segundos
});