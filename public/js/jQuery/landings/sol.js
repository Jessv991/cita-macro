var dispositivo = window.screen.width;

$(document).ready(function () {
    /* 
     ██████╗ █████╗ ██████╗ ██████╗ ██╗   ██╗███████╗███████╗██╗     
    ██╔════╝██╔══██╗██╔══██╗██╔══██╗██║   ██║██╔════╝██╔════╝██║     
    ██║     ███████║██████╔╝██████╔╝██║   ██║███████╗█████╗  ██║     
    ██║     ██╔══██║██╔══██╗██╔══██╗██║   ██║╚════██║██╔══╝  ██║     
    ╚██████╗██║  ██║██║  ██║██║  ██║╚██████╔╝███████║███████╗███████╗
     ╚═════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚══════╝╚══════╝╚══════╝
                                                                     
    */

    $(document).ready(function () {
        var $imgs = $('.carrusel-inner img');
        var index = 0;
        var interval;

        function startCarousel() {
            interval = setInterval(function () {
                $imgs.removeClass('active'); // Ocultar todas las imágenes
                index = (index + 1) % ($imgs.length - 1); // Evitar la última imagen especial
                $imgs.eq(index).addClass('active'); // Mostrar la siguiente imagen
            }, 3000);
        }

        // Iniciar el carrusel automático
        startCarousel();

        // Mostrar la imagen especial cuando el usuario pase el mouse
        $('.carrusel').mouseenter(function () {
            clearInterval(interval); // Detiene el carrusel automático
            $imgs.removeClass('active'); // Oculta todas las imágenes
            $('.extra-img').addClass('active'); // Muestra la imagen especial
        });

        // Regresar al carrusel normal cuando se quite el mouse
        $('.carrusel').mouseleave(function () {
            $('.extra-img').removeClass('active'); // Ocultar imagen especial
            $imgs.eq(index).addClass('active'); // Mostrar la imagen actual del carrusel
            startCarousel(); // Reiniciar el carrusel
        });
    });


    /* 
   ██████╗  ██████╗ ████████╗ ██████╗ ███╗   ██╗    ███████╗██╗      ██████╗ ████████╗ █████╗ ███╗   ██╗████████╗███████╗
   ██╔══██╗██╔═══██╗╚══██╔══╝██╔═══██╗████╗  ██║    ██╔════╝██║     ██╔═══██╗╚══██╔══╝██╔══██╗████╗  ██║╚══██╔══╝██╔════╝
   ██████╔╝██║   ██║   ██║   ██║   ██║██╔██╗ ██║    █████╗  ██║     ██║   ██║   ██║   ███████║██╔██╗ ██║   ██║   █████╗  
   ██╔══██╗██║   ██║   ██║   ██║   ██║██║╚██╗██║    ██╔══╝  ██║     ██║   ██║   ██║   ██╔══██║██║╚██╗██║   ██║   ██╔══╝  
   ██████╔╝╚██████╔╝   ██║   ╚██████╔╝██║ ╚████║    ██║     ███████╗╚██████╔╝   ██║   ██║  ██║██║ ╚████║   ██║   ███████╗
   ╚═════╝  ╚═════╝    ╚═╝    ╚═════╝ ╚═╝  ╚═══╝    ╚═╝     ╚══════╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝
                                                                                                                         
   */

    if (dispositivo >= 992) {

        $('#btn-flotante').on('click', function (e) {

            e.preventDefault();

            $('.lado-izq').addClass('col-lg-8').css({ position: 'relative', width: '100%', right: '0%' }).animate({ width: '66.66666667%', right: '0%' }, 1000);
            $('.lado-der').removeClass('d-none').css({ position: 'relative', right: '-100%' }).show().animate({ right: '0%' }, 1500);
            //$('.carrusel-inner').attr('style', 'height: 500px !important');
            $('.redes-style').attr('style', 'width: 5.5% !important');
            $('.blog-style').attr('style', 'width: 4.3% !important');
            $('.btn-flotante').addClass('d-none');
            $('#carrusel-inner').removeClass('carrusel-inner').addClass('carrusel-inner-2');
            $('#cont-top').removeClass('cont-top').addClass('cont-top-2');
            $('#text-left').removeClass('text-left').addClass('text-ret-left');
            $('#text-right').removeClass('text-right').addClass('text-ret-right');
            $('.cont-img').css({ position: 'fixed !important', width: '66.6%' });
            //$('.cont-top').css({ height: '954px' });
        });

        $('.btn-close').on('click', function (e) {

            e.preventDefault();

            $('.btn-flotante').removeClass('d-none');
            $('.lado-der').addClass('d-none');
            $('.lado-izq')
                .css({ position: 'relative', width: '66.66666667%', left: '0%' })
                .animate({ width: '100%' }, 1000, function () {
                    // Una vez terminada la animación de .lado-izq, se cambia la altura de .cont-top
                    $('.cont-img').css({ position: 'fixed !important', width: '100%' });
                    //$('.cont-top').css({ height: '1306px' });
                });

            //$('.carrusel-inner').attr('style', 'height: 704px !important');
            $('#carrusel-inner').removeClass('carrusel-inner-2').addClass('carrusel-inner');
            $('#cont-top').removeClass('cont-top-2').addClass('cont-top');
            $('.redes-style').attr('style', 'width: 3.5% !important');
            $('.blog-style').attr('style', 'width: 2.6% !important');
            $('#text-left').removeClass('text-ret-left').addClass('text-left');
            $('#text-right').removeClass('text-ret-right').addClass('text-right');

        });

    } else {

        $('#btn-flotante').on('click', function (e) {

            $('.cont-img').addClass('d-none');
            $('#view-r').addClass('d-none');
            $('#btn-flotante').addClass('d-none');

            $('.lado-izq').animate({ width: '0%' }, 1000, function () {
                $(this).hide();
            });

            $('.lado-der').removeClass('d-none').css({
                position: 'relative',
                width: '0%',
            }).show().animate({ width: '100%' }, 1500);

        });

        $('.btn-close').on('click', function (e) {

            e.preventDefault();
            $('#view-r').removeClass('d-none');
            $('.lado-der').addClass('d-none').animate({ width: '0%' }, 1000, function () {
                $(this).hide(); // Oculta completamente el lado derecho
            });
            
            $('.lado-izq').show().animate({ width: '100%' }, 1500, function () {
                $('.cont-img').removeClass('d-none');
            });            

            $('#btn-flotante').removeClass('d-none');

        });

    }

    $('.verdes').on('click', function (e) {

        e.preventDefault();

        $('#img-gris').addClass('sombra');
        $('#img-marron').addClass('sombra');
        $('#img-azul').addClass('sombra');
        $('#img-amarillo').addClass('sombra');
        $('#img-verde').removeClass('sombra');
    });

    $('.grises').on('click', function (e) {

        e.preventDefault();

        $('#img-gris').removeClass('sombra');
        $('#img-marron').addClass('sombra');
        $('#img-azul').addClass('sombra');
        $('#img-amarillo').addClass('sombra');
        $('#img-verde').addClass('sombra');
    });

    $('.marrones').on('click', function (e) {

        e.preventDefault();

        $('#img-gris').addClass('sombra');
        $('#img-marron').removeClass('sombra');
        $('#img-azul').addClass('sombra');
        $('#img-amarillo').addClass('sombra');
        $('#img-verde').addClass('sombra');
    });

    $('.amarillas').on('click', function (e) {

        e.preventDefault();

        $('#img-gris').addClass('sombra');
        $('#img-marron').addClass('sombra');
        $('#img-azul').addClass('sombra');
        $('#img-amarillo').removeClass('sombra');
        $('#img-verde').addClass('sombra');
    });

    $('.azules').on('click', function (e) {

        e.preventDefault();

        $('#img-gris').addClass('sombra');
        $('#img-marron').addClass('sombra');
        $('#img-azul').removeClass('sombra');
        $('#img-amarillo').addClass('sombra');
        $('#img-verde').addClass('sombra');
    });

    /* 
   ██╗     ██╗██████╗ ██████╗ ███████╗██████╗ ██╗ █████╗      █████╗  ██████╗ ███████╗
   ██║     ██║██╔══██╗██╔══██╗██╔════╝██╔══██╗██║██╔══██╗    ██╔══██╗██╔═══██╗██╔════╝
   ██║     ██║██████╔╝██████╔╝█████╗  ██████╔╝██║███████║    ███████║██║   ██║███████╗
   ██║     ██║██╔══██╗██╔══██╗██╔══╝  ██╔══██╗██║██╔══██║    ██╔══██║██║   ██║╚════██║
   ███████╗██║██████╔╝██║  ██║███████╗██║  ██║██║██║  ██║    ██║  ██║╚██████╔╝███████║
   ╚══════╝╚═╝╚═════╝ ╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚═╝╚═╝  ╚═╝    ╚═╝  ╚═╝ ╚═════╝ ╚══════╝
       aplicamos el tiempo de la animación dependiendo del tamaño de la pantalla                                                                            
   */
    /* 
        if(dispositivo >= 992){

            $('#card1').attr('data-aos-delay', '100').attr('data-aos-duration', '1000');
            $('#card2').attr('data-aos-delay', '500').attr('data-aos-duration', '1000');
            $('#card3').attr('data-aos-delay', '1000').attr('data-aos-duration', '1000');
            $('#card4').attr('data-aos-delay', '1500').attr('data-aos-duration', '1000');
    
        }else if(dispositivo >= 768 && dispositivo <= 991){

            $('#card1').attr('data-aos-delay', '100').attr('data-aos-duration', '1000');
            $('#card2').attr('data-aos-delay', '500').attr('data-aos-duration', '1000');
            $('#card3').attr('data-aos-delay', '100').attr('data-aos-duration', '1000');
            $('#card4').attr('data-aos-delay', '500').attr('data-aos-duration', '1000');

        }else {

            $('#card1').attr('data-aos-delay', '100').attr('data-aos-duration', '1000');
            $('#card2').attr('data-aos-delay', '100').attr('data-aos-duration', '1000');
            $('#card3').attr('data-aos-delay', '100').attr('data-aos-duration', '1000');
            $('#card4').attr('data-aos-delay', '100').attr('data-aos-duration', '1000');
            
        } */


});