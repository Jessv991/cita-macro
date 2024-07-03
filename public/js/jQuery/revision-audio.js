

$(document).ready(function () {
    $('#provincias').on('change', function () {
        var provinciaId = $(this).val();
        if (provinciaId) {
            $.ajax({
                url: getLocalidadByProvinciaRoute, // Ruta definida en el archivo Blade
                type: 'POST',
                data: {
                    provincias: provinciaId,
                    _token: csrfToken // Token CSRF definido en el archivo Blade
                },
                success: function (data) {
                    $('#ciudad').empty();
                    // Agregar opción por defecto
                    $('#ciudad').append(
                        '<option value="">' + seleccionaUnaCiudadText + '</option>'
                    );
                    // Agregar opciones de ciudades obtenidas del servidor
                    $.each(data, function (key, value) {
                        $('#ciudad').append('<option value="' + value.d3 + '">' + value.d3 + '</option>');
                    });
                }
            });
        } else {
            // Si no se selecciona ninguna provincia, vaciar el select de ciudades
            $('#ciudad').empty();
            // Agregar opción por defecto
            $('#ciudad').append('<option value="">' + seleccionaUnaCiudadText + '</option>');
        }
    });

    // Para agregar la opción por defecto cuando se carga la página por primera vez
    $('#ciudad').append('<option value="">' + seleccionaUnaCiudadText + '</option>');


    $('#optica')

    var _weblogig = $('#_weblogin').val();
    var _optica = $('#_optica').val();

    if (_weblogig && _optica) {

        $.ajax({

            url: getOpticasByWebloginAndOptica, // Ruta definida en el archivo Blade
            type: 'POST',
            data: {
                _token: csrfToken, // Asegúrate de incluir el token CSRF en los datos de la solicitud
                weblogig: _weblogig,
                optica: _optica
            },
            success: function (data) {
                $('#optica').empty();
                if (data.length == 1) {
                    $.each(data, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                } else {
                    // Agregar opción por defecto
                    $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                    // Agregar opciones de ciudades obtenidas del servidor
                    $.each(data, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                }
            }
        });

    } else if (_weblogig){

        $.ajax({

            url: getOpticasByWeblogin, // Ruta definida en el archivo Blade
            type: 'POST',
            data: {
                _token: csrfToken, // Asegúrate de incluir el token CSRF en los datos de la solicitud
                weblogig: _weblogig
            },
            success: function (data) {
                $('#optica').empty();
                if (data.length == 1) {
                    $.each(data, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                } else {
                    // Agregar opción por defecto
                    $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                    // Agregar opciones de ciudades obtenidas del servidor
                    $.each(data, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                }
            }
        });
    }else{
        $('#ciudad').on('change', function () {
            var ciudadId = $(this).val();
            if (ciudadId) {
                $.ajax({
                    url: getOpticasByProvinciaRoute, // Ruta definida en el archivo Blade
                    type: 'POST',
                    data: {
                        ciudad: ciudadId,
                        _token: csrfToken // Token CSRF definido en el archivo Blade
                    },
                    success: function (data) {
                        $('#optica').empty();
                        if (data.length == 1) {
                            $.each(data, function (key, value) {
                                $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                            });
                        } else {
                            // Agregar opción por defecto
                            $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                            // Agregar opciones de ciudades obtenidas del servidor
                            $.each(data, function (key, value) {
                                $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                            });
                        }
                    }
                });
            }
        });
    
        // Para agregar la opción por defecto cuando se carga la página por primera vez
        $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
    
    }
});
