var problema = 0;
var correcta = 0;

// START
$('#quest-button').on('click', () => {
    $('#quest').addClass('d-none');
    $('#quest-1').removeClass('d-none');
    $('.efect-test').removeClass('d-none').hide().fadeIn(2000);//efecto de aparición
});

// QUEST 1
$('#quest-button-1-v').on('click', () => {
    problema++;
    $('#quest-1').addClass('d-none');
    $('#quest-2').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

$('#quest-button-1-f').on('click', () => {
    correcta++;
    $('#quest-1').addClass('d-none');
    $('#quest-2').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

// QUEST 2
$('#quest-button-2-v').on('click', () => {
    problema++;
    $('#quest-2').addClass('d-none');
    $('#quest-3').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

$('#quest-button-2-f').on('click', () => {
    correcta++;
    $('#quest-2').addClass('d-none');
    $('#quest-3').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

// QUEST 3
$('#quest-button-3-v').on('click', () => {
    problema++;
    $('#quest-3').addClass('d-none');
    $('#quest-4').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

$('#quest-button-3-f').on('click', () => {
    correcta++;
    $('#quest-3').addClass('d-none');
    $('#quest-4').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

// QUEST 4
$('#quest-button-4-v').on('click', () => {
    problema++;
    $('#quest-4').addClass('d-none');
    $('#quest-5').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

$('#quest-button-4-f').on('click', () => {
    correcta++;
    $('#quest-4').addClass('d-none');
    $('#quest-5').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
});

// QUEST 5
$('#quest-button-5-v').on('click', () => {
    problema++;
    $('#quest-5').addClass('d-none');
    $('#quest-6').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);

    // Llamar a la función resultado al final del cuestionario
    resultado(problema, correcta);
});

$('#quest-button-5-f').on('click', () => {
    correcta++;
    $('#quest-5').addClass('d-none');
    $('#quest-6').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);

    // Llamar a la función resultado al final del cuestionario
    resultado(problema, correcta);
});

function resultado(problema, correcta) {
    if (problema > correcta) {
        $('#resultado-1').removeClass('d-none').addClass('fade-in');
    } else {
        $('#resultado-2').removeClass('d-none').addClass('fade-in');
    } 
}

function questReset(value) {
    $('#resultado-' + value).addClass('d-none');
    $('#quest').removeClass('d-none').addClass('fade-in');
    $('.efect-test').removeClass('d-none').hide().fadeIn(800);
    problema = 0;
    correcta = 0;
}
