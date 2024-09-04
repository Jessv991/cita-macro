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
        setInterval(function () {
            // Ocultar imagen actual
            $imgs.eq(index).removeClass('active');

            // Calcular el índice de la siguiente imagen circularmente
            index = (index + 1) % $imgs.length;

            // Mostrar la siguiente imagen
            $imgs.eq(index).addClass('active');
        }, 3000); // Cambiar de imagen cada 3 segundos
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

            $('.card-style').removeClass('col-lg-3').addClass('col-lg-6');
            $('.lado-izq').addClass('col-lg-8').css({ position: 'relative', width: '100%', right: '0%' }).animate({ width: '66.66666667%', right: '0%' }, 1000);
            $('.lado-der').removeClass('d-none').css({ position: 'relative', right: '-100%' }).show().animate({ right: '0%' }, 1500);
            $('.carrusel-inner').attr('style', 'height: 500px !important');
            $('.redes-style').attr('style', 'width: 5.5% !important');
            $('.blog-style').attr('style', 'width: 4.3% !important');
            $('.style-tarj').removeClass('w-50').addClass('w-75');
            $('.btn-flotante').addClass('d-none');
            $('.med-img-circle').attr('style', 'width: 38% !important');
        });

        $('.btn-close').on('click', function (e) {

            e.preventDefault();

            $('.btn-flotante').removeClass('d-none');
            $('.card-style').removeClass('col-lg-6').addClass('col-lg-3');
            $('.lado-der').addClass('d-none');
            $('.lado-izq').css({ position: 'relative', width: '66.66666667%', left: '0%' }).animate({ width: '100%', left: '0%' }, 1000);
            $('.carrusel-inner').attr('style', 'height: 704px !important');
            $('.redes-style').attr('style', 'width: 3.5% !important');
            $('.blog-style').attr('style', 'width: 2.6% !important');
            $('.style-tarj').removeClass('w-75').addClass('w-50');
            $('.med-img-circle').attr('style', 'width: 64% !important');
        });

    } else {

        $('#btn-flotante').on('click', function (e) {

            e.preventDefault();

            $('#btn-flotante').addClass('d-none');
            $('.form_flotante').removeClass('d-none').fadeOut(1).fadeIn(500);

        });

        $('.btn-close-flotante').on('click', function (e) {

            e.preventDefault();

            $('.form_flotante').fadeOut(500, function () {
                $('.form_flotante').addClass('d-none');
            });

            $('#btn-flotante').removeClass('d-none');
            
        });
        
    }
    
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
    }

});