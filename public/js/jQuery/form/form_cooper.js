var dispositivo = window.screen.width;

$(document).ready(function () {

    //animación del icono de mapa
    $('#group').on('change', function () {
        var grupoId = $(this).val();

        $('#group').empty();//limpia el select ciudad

        if (grupoId) {
            $.ajax({
                url: getWebloginByGroup, // Ruta definida en el archivo Blade
                type: 'POST',
                data: {
                    grupo: grupoId,
                    _token: csrfToken // Token CSRF definido en el archivo Blade llamado foorte
                },
                success: function (data) {

                    $('#ciudad').empty();

                }
            });
        } else {
            $('#group').empty();
            $('#group').append('<option value="">' + selectGrupo + '</option>');
        }

    });


});


