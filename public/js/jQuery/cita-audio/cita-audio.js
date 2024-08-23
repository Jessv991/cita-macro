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

    var formActivo = false;

    $('#btn-flotante').on('click', function (e) {

        e.preventDefault();

        if(formActivo === false){
            $('.card-style').removeClass('col-lg-3').addClass('col-lg-6');
            $('.lado-izq').addClass('col-lg-8').css({ position: 'relative', width: '100%', right: '0%' }).animate({ width: '66.66666667%', right: '0%' }, 800);
            $('.lado-der').removeClass('d-none').css({ position: 'relative', right: '-100%' }).show().animate({ right: '0%' }, 2000);
            $('.redes-style').attr('style', 'width: 5.5% !important');
            $('.blog-style').attr('style', 'width: 4.3% !important');
            $('.style-tarj').removeClass('w-50').addClass('w-75');
            $('.btn-flotante').addClass('d-none');
            $('.med-img-circle').attr('style', 'width: 38% !important');
            formActivo = true;
        }

    });

    $('.btn-close').on('click', function (e) {
        $('.btn-flotante').removeClass('d-none');
        $('.card-style').removeClass('col-lg-6').addClass('col-lg-3');
        $('.lado-izq').css({ position: 'relative', width: '66.66666667%', left: '0%' }).animate({ width: '100%', left: '0%' }, 2000);
        $('.lado-der').css({ position: 'relative', right: '-100%' }).show().animate({ right: '0%' }, 2000);
        $('.redes-style').attr('style', 'width: 3.5% !important');
        $('.blog-style').attr('style', 'width: 2.6% !important');
        $('.style-tarj').removeClass('w-75').addClass('w-50');
        $('.med-img-circle').attr('style', 'width: 64% !important');
        formActivo = false;
    });

});