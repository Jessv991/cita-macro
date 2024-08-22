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

    var flotanteActivo = false;

    $('#btn-flotante').on('click', function (e) {

        e.preventDefault();

        $('.card-style').removeClass('col-lg-3').addClass('col-lg-6');
        $('.lado-izq').addClass('col-lg-8');
        $('.lado-der').removeClass('d-none');
        $('.formulario').removeClass('d-none');
        $('.carrusel').removeClass('w-75').addClass('w-100');
        $('.redes-style').attr('style', 'width: 5.5% !important');
        $('.blog-style').attr('style', 'width: 4.3% !important');
        $('.style-tarj').removeClass('w-50').addClass('w-75');
        $('.btn-flotante').addClass('d-none');
        $('.med-img-circle').attr('style', 'width: 38% !important');

    });

    $('.btn-close').on('click', function (e) {
        $('.btn-flotante').removeClass('d-none');
        $('.card-style').removeClass('col-lg-6').addClass('col-lg-3');
        $('.lado-izq').removeClass('col-lg-8');
        $('.lado-der').addClass('d-none');
        $('.formulario').addClass('d-none');
        $('.carrusel').removeClass('w-100').addClass('w-75');
        $('.redes-style').attr('style', 'width: 3.5% !important');
        $('.blog-style').attr('style', 'width: 2.6% !important');
        $('.style-tarj').removeClass('w-75').addClass('w-50');
        $('.med-img-circle').attr('style', 'width: 64% !important');
    });

});