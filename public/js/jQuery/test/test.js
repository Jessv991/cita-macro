var diarias = 0;
var menusales = 0;

// START
$('#quest-button').on('click', () => {
    $('#quest').addClass('d-none');
    $('#quest-1').removeClass('d-none').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-1').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
});

// QUEST 1
$('#quest-button-1-v').on('click', () => {
    diarias++
    $('#quest-1').addClass('d-none');
    $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})

$('#quest-button-1-f').on('click', () => {
    menusales++
    $('#quest-1').addClass('d-none');
    $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-2').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})


// QUEST 2
$('#quest-button-2-v').on('click', () => {
    diarias++
    $('#quest-2').addClass('d-none');
    $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})

$('#quest-button-2-f').on('click', () => {
    menusales++
    $('#quest-2').addClass('d-none');
    $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-3').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})


// QUEST 3
$('#quest-button-3-v').on('click', () => {
    diarias++
    $('#quest-3').addClass('d-none');
    $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})

$('#quest-button-3-f').on('click', () => {
    menusales++
    $('#quest-3').addClass('d-none');
    $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-4').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})


// QUEST 4
$('#quest-button-4-v').on('click', () => {
    diarias++
    menusales++
    $('#quest-4').addClass('d-none');
    $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})

$('#quest-button-4-f').on('click', () => {
    $('#quest-4').addClass('d-none');
    $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-5').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})


// QUEST 5
$('#quest-button-5-v').on('click', () => {
    diarias++
    menusales++
    $('#quest-5').addClass('d-none');
    $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})

$('#quest-button-5-f').on('click', () => {
    $('#quest-5').addClass('d-none');
    $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest-6').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
})


// QUEST 6
$('#quest-button-6-v').on('click', () => {
    diarias++
    $('#quest-6').addClass('d-none');

    resultado(diarias, menusales)
})

$('#quest-button-6-f').on('click', () => {
    menusales++
    $('#quest-6').addClass('d-none');

    resultado(diarias, menusales);
})

function questReset(value) {
    $('#resultado-' + value).addClass('d-none');
    $('#quest').removeClass('d-none').addClass('fade-in').addClass('efect-test');
    if(dispositivo <= 991){
        $('#quest').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
    }
    
    diarias = 0
    menusales = 0
}

function resultado(diarias, menusales) {
    if (diarias > menusales) {
        $('#resultado-1').removeClass('d-none').addClass('fade-in').addClass('efect-test');
        if(dispositivo <= 991){
            $('#resultado-1').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
        }
    } else if (menusales > diarias) {
        $('#resultado-2').removeClass('d-none').addClass('fade-in').addClass('efect-test');
        if(dispositivo <= 991){
            $('#resultado-2').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
        }
    } else {
        $('#resultado-3').removeClass('d-none').addClass('fade-in').addClass('efect-test');
        if(dispositivo <= 991){
            $('#resultado-3').removeClass('d-none').addClass('fade-in').addClass('efect-tablet');
        }
    }
}