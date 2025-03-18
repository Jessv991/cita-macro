let orangTrue = true;
let yellTrue = true;
let redTrue = true;
let greenTrue = true;
let bluTrue = true;


$('#orang1').on('click', function (e) {
    // Muestra la imagen de abajo con el efecto
    if (orangTrue) {
        orangTrue = false;
        $('#orang2').removeClass('d-none').css({ animation: 'slideDown 0.9s ease-out' });
    } else {
        orangTrue = true;
        $('#orang2').css({
            '-webkit-animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both',
            'animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both'
        }).one('animationend', function() {
            $(this).addClass('d-none'); // Se oculta después de la animación
        });        
    }
});

$('#yell1').on('click', function (e) {
    if (yellTrue) {
        yellTrue = false;
        $('#yell2').removeClass('d-none').css({ animation: 'slideDown 0.9s ease-out' });
    } else {
        yellTrue = true;
        $('#yell2').css({
            '-webkit-animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both',
            'animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both'
        }).one('animationend', function() {
            $(this).addClass('d-none');
        });

    }
});


$('#red1').on('click', function (e) {
    if (redTrue) {
        redTrue = false;
        $('#red2').removeClass('d-none').css({ animation: 'slideDown 0.9s ease-out' });
    } else {
        redTrue = true;
        $('#red2').css({
            '-webkit-animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both',
            'animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both'
        }).one('animationend', function() {
            $(this).addClass('d-none');
        });

    }

});

$('#green1').on('click', function (e) {
    if (greenTrue) {
        greenTrue = false;
        $('#green2').removeClass('d-none').css({ animation: 'slideDown 0.9s ease-out' });
    } else {
        greenTrue = true;
        $('#green2').css({
            '-webkit-animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both',
            'animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both'
        }).one('animationend', function() {
            $(this).addClass('d-none');
        });

    }

});

$('#blu1').on('click', function (e) {
    if (bluTrue) {
        bluTrue = false;
        $('#blu2').removeClass('d-none').css({ animation: 'slideDown 0.9s ease-out' });
    } else {
        bluTrue = true;
        $('#blu2').css({
            '-webkit-animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both',
            'animation': 'slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both'
        }).one('animationend', function() {
            $(this).addClass('d-none');
        });

    }

});
