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
        var $imgs = $('.carrusel-inner img'); // Todas las imágenes del carrusel
        var index = 0;
        var interval;
    
        function startCarousel() {
            interval = setInterval(function () {
                $imgs.removeClass('active'); // Ocultar todas las imágenes
                index = (index + 1) % ($imgs.length - 4); // Evitar las imágenes extra
                $imgs.eq(index).addClass('active'); // Mostrar la siguiente imagen
            }, 3000);
        }
    
        // Iniciar el carrusel automático
        startCarousel();
    
        // Mostrar la imagen especial cuando el usuario pase el mouse
        $('.carrusel').mouseenter(function () {
            clearInterval(interval); // Detiene el carrusel automático
    
            // Obtener la imagen actualmente activa
            let $imgActiva = $('.carrusel-inner img.active');
            
            // Ocultar todas las imágenes
            $imgs.removeClass('active');
    
            // Mostrar la imagen especial correspondiente
            if ($imgActiva.hasClass('girl')) {
                $('.extra-img1').addClass('active');
            } else if ($imgActiva.hasClass('man')) {
                $('.extra-img2').addClass('active');
            } else if ($imgActiva.hasClass('woman')) {
                $('.extra-img3').addClass('active');
            } else if ($imgActiva.hasClass('grandpa')) {
                $('.extra-img4').addClass('active'); 
            }
        });
    
        // Regresar al carrusel normal cuando se quite el mouse
        $('.carrusel').mouseleave(function () {
            // Ocultar todas las imágenes especiales de una sola vez
            $('.extra-img1, .extra-img2, .extra-img3, .extra-img4').removeClass('active');
    
            // Volver a mostrar la imagen activa en el carrusel
            $imgs.eq(index).addClass('active'); 
            startCarousel(); // Reiniciar el carrusel
        });

        var $imgs2 = $('.carrusel-inner2 img');
        var index2 = 0;
        setInterval(function() {
            // Ocultar imagen actual
            $imgs2.eq(index2).removeClass('active');

            // Calcular el índice de la siguiente imagen circularmente
            index2 = (index2 + 1) % $imgs2.length;

            // Mostrar la siguiente imagen
            $imgs2.eq(index2).addClass('active');
        }, 3000)

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

    //==================PRIMERA PREGUNTA================== 

    let verdes = 0;
    let grises = 0;
    let marrones = 0;
    let amarillas = 0;
    let azules = 0;

    $('#verdes-q1').on('click', function (e) {

        e.preventDefault();

        $('#verdes-q1').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q1').addClass('clausurado');
        $('#marrones-q1').addClass('clausurado');
        $('#amarillas-q1').addClass('clausurado');
        $('#azules-q1').addClass('clausurado');

        $('#flush-collapseOne').collapse('hide');
        $('#flush-collapseTwo').collapse('show');

        verdes++;
    });

    $('#grises-q1').on('click', function (e) {

        e.preventDefault();
        $('#grises-q1').css({ 'background-color': '#efe5f0ad' });
        $('#verdes-q1').addClass('clausurado');
        $('#marrones-q1').addClass('clausurado');
        $('#amarillas-q1').addClass('clausurado');
        $('#azules-q1').addClass('clausurado');

        $('#flush-collapseOne').collapse('hide');
        $('#flush-collapseTwo').collapse('show');

        grises++;
    });

    $('#marrones-q1').on('click', function (e) {

        e.preventDefault();
        $('#marrones-q1').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q1').addClass('clausurado');
        $('#verdes-q1').addClass('clausurado');
        $('#amarillas-q1').addClass('clausurado');
        $('#azules-q1').addClass('clausurado');

        $('#flush-collapseOne').collapse('hide');
        $('#flush-collapseTwo').collapse('show');

        marrones++;
    });

    $('#amarillas-q1').on('click', function (e) {

        e.preventDefault();
        $('#amarillas-q1').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q1').addClass('clausurado');
        $('#marrones-q1').addClass('clausurado');
        $('#verdes-q1').addClass('clausurado');
        $('#azules-q1').addClass('clausurado');

        $('#flush-collapseOne').collapse('hide');
        $('#flush-collapseTwo').collapse('show');

        amarillas++;
    });

    $('#azules-q1').on('click', function (e) {

        e.preventDefault();
        $('#azules-q1').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q1').addClass('clausurado');
        $('#marrones-q1').addClass('clausurado');
        $('#amarillas-q1').addClass('clausurado');
        $('#verdes-q1').addClass('clausurado');

        $('#flush-collapseOne').collapse('hide');
        $('#flush-collapseTwo').collapse('show');

        azules++;
    });

    //==================SEGUNDA PREGUNTA==================


    $('#verdes-q2').on('click', function (e) {

        e.preventDefault();
        $('#verdes-q2').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q2').addClass('clausurado');
        $('#marrones-q2').addClass('clausurado');
        $('#amarillas-q2').addClass('clausurado');
        $('#azules-q2').addClass('clausurado');

        $('#flush-collapseTwo').collapse('hide');
        $('#flush-collapseThree').collapse('show');

        verdes++;
    });

    $('#grises-q2').on('click', function (e) {

        e.preventDefault();
        $('#grises-q2').css({ 'background-color': '#efe5f0ad' });
        $('#verdes-q2').addClass('clausurado');
        $('#marrones-q2').addClass('clausurado');
        $('#amarillas-q2').addClass('clausurado');
        $('#azules-q2').addClass('clausurado');

        $('#flush-collapseTwo').collapse('hide');
        $('#flush-collapseThree').collapse('show');

        grises++;
    });

    $('#marrones-q2').on('click', function (e) {

        e.preventDefault();
        $('#marrones-q2').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q2').addClass('clausurado');
        $('#verdes-q2').addClass('clausurado');
        $('#amarillas-q2').addClass('clausurado');
        $('#azules-q2').addClass('clausurado');

        $('#flush-collapseTwo').collapse('hide');
        $('#flush-collapseThree').collapse('show');

        marrones++;
    });

    $('#amarillas-q2').on('click', function (e) {

        e.preventDefault();
        $('#amarillas-q2').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q2').addClass('clausurado');
        $('#marrones-q2').addClass('clausurado');
        $('#verdes-q2').addClass('clausurado');
        $('#azules-q2').addClass('clausurado');

        $('#flush-collapseTwo').collapse('hide');
        $('#flush-collapseThree').collapse('show');

        amarillas++;
    });

    $('#azules-q2').on('click', function (e) {

        e.preventDefault();
        $('#azules-q2').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q2').addClass('clausurado');
        $('#marrones-q2').addClass('clausurado');
        $('#amarillas-q2').addClass('clausurado');
        $('#verdes-q2').addClass('clausurado');

        $('#flush-collapseTwo').collapse('hide');
        $('#flush-collapseThree').collapse('show');

        azules++;
    });

    //==================TERCERA PREGUNTA==================

    $('#verdes-q3').on('click', function (e) {

        e.preventDefault();
        $('#verdes-q3').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q3').addClass('clausurado');
        $('#marrones-q3').addClass('clausurado');
        $('#amarillas-q3').addClass('clausurado');
        $('#azules-q3').addClass('clausurado');

        $('#flush-collapseThree').collapse('hide');
        $('#flush-collapseFour').collapse('show');

        verdes++;
    });

    $('#grises-q3').on('click', function (e) {

        e.preventDefault();
        $('#grises-q3').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q3').addClass('clausurado');
        $('#marrones-q3').addClass('clausurado');
        $('#amarillas-q3').addClass('clausurado');
        $('#azules-q3').addClass('clausurado');

        $('#flush-collapseThree').collapse('hide');
        $('#flush-collapseFour').collapse('show');

        grises++;
    });

    $('#marrones-q3').on('click', function (e) {

        e.preventDefault();
        $('#marrones-q3').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q3').addClass('clausurado');
        $('#verdes-q3').addClass('clausurado');
        $('#amarillas-q3').addClass('clausurado');
        $('#azules-q3').addClass('clausurado');

        $('#flush-collapseThree').collapse('hide');
        $('#flush-collapseFour').collapse('show');

        marrones++;
    });

    $('#amarillas-q3').on('click', function (e) {

        e.preventDefault();
        $('#amarillas-q3').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q3').addClass('clausurado');
        $('#marrones-q3').addClass('clausurado');
        $('#verdes-q3').addClass('clausurado');
        $('#azules-q3').addClass('clausurado');

        $('#flush-collapseThree').collapse('hide');
        $('#flush-collapseFour').collapse('show');

        amarillas++;
    });

    $('#azules-q3').on('click', function (e) {

        e.preventDefault();
        $('#azules-q3').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q3').addClass('clausurado');
        $('#marrones-q3').addClass('clausurado');
        $('#amarillas-q3').addClass('clausurado');
        $('#verdes-q3').addClass('clausurado');

        $('#flush-collapseThree').collapse('hide');
        $('#flush-collapseFour').collapse('show');

        azules++;
    });

    //==================CUARTA PREGUNTA==================

    $('#verdes-q4').on('click', function (e) {

        e.preventDefault();
        $('#verdes-q4').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q4').addClass('clausurado');
        $('#marrones-q4').addClass('clausurado');
        $('#amarillas-q4').addClass('clausurado');
        $('#azules-q4').addClass('clausurado');

        $('#flush-collapseFour').collapse('hide');

        verdes++;
        resultados(amarillas, azules, marrones, verdes, grises)
    });

    $('#grises-q4').on('click', function (e) {

        e.preventDefault();
        $('#grises-q4').css({ 'background-color': '#efe5f0ad' });
        $('#verdes-q4').addClass('clausurado');
        $('#marrones-q4').addClass('clausurado');
        $('#amarillas-q4').addClass('clausurado');
        $('#azules-q4').addClass('clausurado');

        $('#flush-collapseFour').collapse('hide');

        grises++;
        resultados(amarillas, azules, marrones, verdes, grises)
    });

    $('#marrones-q4').on('click', function (e) {

        e.preventDefault();
        $('#marrones-q4').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q4').addClass('clausurado');
        $('#verdes-q4').addClass('clausurado');
        $('#amarillas-q4').addClass('clausurado');
        $('#azules-q4').addClass('clausurado');

        $('#flush-collapseFour').collapse('hide');

        marrones++;
        resultados(amarillas, azules, marrones, verdes, grises)
    });

    $('#amarillas-q4').on('click', function (e) {

        e.preventDefault();
        $('#amarillas-q4').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q4').addClass('clausurado');
        $('#marrones-q4').addClass('clausurado');
        $('#verdes-q4').addClass('clausurado');
        $('#azules-q4').addClass('clausurado');

        $('#flush-collapseFour').collapse('hide');

        amarillas++;
        resultados(amarillas, azules, marrones, verdes, grises)
    });

    $('#azules-q4').on('click', function (e) {

        e.preventDefault();
        $('#azules-q4').css({ 'background-color': '#efe5f0ad' });
        $('#grises-q4').addClass('clausurado');
        $('#marrones-q4').addClass('clausurado');
        $('#amarillas-q4').addClass('clausurado');
        $('#verdes-q4').addClass('clausurado');

        $('#flush-collapseFour').collapse('hide');

        azules++;

        resultados(amarillas, azules, marrones, verdes, grises)
    });

    function resultados(amarillas, azules, marrones, verdes, grises) {

        if (verdes > grises && verdes > marrones && verdes > amarillas && verdes > azules) {
            $('#img-gris').addClass('sombra');
            $('#img-marron').addClass('sombra');
            $('#img-azul').addClass('sombra');
            $('#img-amarillo').addClass('sombra');
            $('#img-verde').removeClass('sombra');
        } else if (grises > verdes && grises > marrones && grises > amarillas && grises > azules) {
            $('#img-gris').removeClass('sombra');
            $('#img-marron').addClass('sombra');
            $('#img-azul').addClass('sombra');
            $('#img-amarillo').addClass('sombra');
            $('#img-verde').addClass('sombra');
        } else if (marrones > verdes && marrones > grises && marrones > amarillas && marrones > azules) {
            $('#img-gris').addClass('sombra');
            $('#img-marron').removeClass('sombra');
            $('#img-azul').addClass('sombra');
            $('#img-amarillo').addClass('sombra');
            $('#img-verde').addClass('sombra');
        } else if (amarillas > verdes && amarillas > grises && amarillas > marrones && amarillas > azules) {
            $('#img-gris').addClass('sombra');
            $('#img-marron').addClass('sombra');
            $('#img-azul').addClass('sombra');
            $('#img-amarillo').removeClass('sombra');
            $('#img-verde').addClass('sombra');
        } else if (azules > verdes) {
            $('#img-gris').addClass('sombra');
            $('#img-marron').addClass('sombra');
            $('#img-azul').removeClass('sombra');
            $('#img-amarillo').addClass('sombra');
            $('#img-verde').addClass('sombra');
        }

    }

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