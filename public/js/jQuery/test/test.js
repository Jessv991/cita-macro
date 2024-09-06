var problema = 0;
var correcta = 0;

var dispositivo = window.screen.width;

// START
$('#quest-button').on('click', () => {

    $('#quest').addClass('d-none');
    $('#quest-1').removeClass('d-none').addClass('efect-test');

    if(dispositivo <= 991){
        $('#quest-1').removeClass('d-none').addClass('efect-tablet');
    }
});

// QUEST 1
$('#quest-button-1-v').on('click', () => {
    problema++;
    $('#quest-1').addClass('d-none');
    $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

$('#quest-button-1-f').on('click', () => {
    correcta++;
    $('#quest-1').addClass('d-none');
    $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

// QUEST 2
$('#quest-button-2-v').on('click', () => {
    problema++;
    $('#quest-2').addClass('d-none');
    $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

$('#quest-button-2-f').on('click', () => {
    correcta++;
    $('#quest-2').addClass('d-none');
    $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

// QUEST 3
$('#quest-button-3-v').on('click', () => {
    problema++;
    $('#quest-3').addClass('d-none');
    $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

$('#quest-button-3-f').on('click', () => {
    correcta++;
    $('#quest-3').addClass('d-none');
    $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

// QUEST 4
$('#quest-button-4-v').on('click', () => {
    problema++;
    $('#quest-4').addClass('d-none');
    $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

$('#quest-button-4-f').on('click', () => {
    correcta++;
    $('#quest-4').addClass('d-none');
    $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

// QUEST 5
$('#quest-button-5-v').on('click', () => {
    problema++;
    $('#quest-5').addClass('d-none');
    $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }

    // Llamar a la función resultado al final del cuestionario
    resultado(problema, correcta);
});

$('#quest-button-5-f').on('click', () => {
    correcta++;
    $('#quest-5').addClass('d-none');
    $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }

    // Llamar a la función resultado al final del cuestionario
    resultado(problema, correcta);
});


function questReset(value) {
    $('#resultado-' + value).addClass('d-none');
    $('#quest').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
    
    if(dispositivo <= 991){
        $('.btn-flotante').removeClass('d-none');
        $('.style-tarj').removeClass('text-fixed');
    }

    problema = 0;
    correcta = 0;
}

function resultado(problema, correcta) {
    if (problema > correcta) {
        $('#resultado-1').removeClass('d-none').addClass('fade-in').addClass('efect-test');
        if(dispositivo <= 991){
            $('#resultado-1').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
        }
    } else {
        $('#resultado-2').removeClass('d-none').addClass('fade-in').addClass('efect-test');
        if(dispositivo <= 991){
            $('#resultado-2').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
        }
    } 
}