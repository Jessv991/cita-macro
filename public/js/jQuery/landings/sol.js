function switchImages(element) {
    let img1 = element; // orang1
    let img2 = document.getElementById("orang2"); // orang2

    // Agregar animación de salida a img1
    img1.classList.add("img-hidden-out");

    setTimeout(() => {
        //img1.classList.add("d-none"); // Ocultar la imagen 1 después de la animación
        img2.classList.remove("d-none");
        img2.classList.add("img-hidden"); // Mostrar imagen 2 con animación
    }, 500); // Tiempo igual al de la animación CSS
}

$('#yell1').on('click', function (e) {

    $('#yell2').removeClass('d-none');

});

$('#red1').on('click', function (e) {

    $('#red2').removeClass('d-none');

});

$('#green1').on('click', function (e) {

    $('#green2').removeClass('d-none');

});

$('#blu1').on('click', function (e) {

    $('#blu2').removeClass('d-none');

});
