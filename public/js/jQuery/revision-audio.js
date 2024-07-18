
/* 
███████╗███████╗██╗     ███████╗ ██████╗ ██████╗██╗ ██████╗ ███╗   ██╗     ██████╗██╗██╗   ██╗██████╗  █████╗ ██████╗ 
██╔════╝██╔════╝██║     ██╔════╝██╔════╝██╔════╝██║██╔═══██╗████╗  ██║    ██╔════╝██║██║   ██║██╔══██╗██╔══██╗██╔══██╗
███████╗█████╗  ██║     █████╗  ██║     ██║     ██║██║   ██║██╔██╗ ██║    ██║     ██║██║   ██║██║  ██║███████║██║  ██║
╚════██║██╔══╝  ██║     ██╔══╝  ██║     ██║     ██║██║   ██║██║╚██╗██║    ██║     ██║██║   ██║██║  ██║██╔══██║██║  ██║
███████║███████╗███████╗███████╗╚██████╗╚██████╗██║╚██████╔╝██║ ╚████║    ╚██████╗██║╚██████╔╝██████╔╝██║  ██║██████╔╝
╚══════╝╚══════╝╚══════╝╚══════╝ ╚═════╝ ╚═════╝╚═╝ ╚═════╝ ╚═╝  ╚═══╝     ╚═════╝╚═╝ ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝ 
                                                                                                                      
*/

$(document).ready(function () {

    var weblogin = $('#_weblogin').val();
    var optica = $('#_optica').val();


    //condicional según la ruta que se pase

    if (weblogin && optica) {
        putOpticasByWeblogin();
    } else if (weblogin) {
        putCityByweblogi();
        //getOpticaSelectCity();
    } else {
        getCityBySelectState();
        getOpticaSelectCity()
    }


    //si el cliente selecciona la provincia se ejecuta esta función
    function getCityBySelectState() {

        $('#provincias').on('change', function () {
            var provinciaId = $(this).val();
            $('#optica').empty();
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

                        if (data.length == 1) {
                            // Si solo hay una ciudad, seleccionarla automáticamente
                            $.each(data, function (key, value) {
                                $('#ciudad').append('<option value="' + value.d3 + '" selected>' + value.d3 + '</option>');

                                //en caso de que haya sólo una tienda ejecutamos esta función
                                putOpticasByProvincia(value.d3);
                            });
                        } else {
                            // Agregar opción por defecto
                            $('#ciudad').append('<option value="">' + seleccionaUnaCiudadText + '</option>');

                            // Agregar opciones de ciudades obtenidas del servidor
                            $.each(data, function (key, value) {
                                $('#ciudad').append('<option value="' + value.d3 + '">' + value.d3 + '</option>');
                            });
                        }

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
    }

    //si pasan el weblogin se coloca automáticamente 
    function putCityByweblogi() {

        $.ajax({
            url: getOpticasByWeblogin,
            method: 'POST',
            data: {
                'weblogin': $('#_weblogin').val(),
                _token: csrfToken
            },
            success: function (response) {

                 console.log(response);
                $('#optica').empty();
                if (response.length == 1) {
                    $.each(response, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                } else {
                    // Agregar opción por defecto
                    $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                    // Agregar opciones de ciudades obtenidas del servidor
                    $.each(response, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                }

            },
            error: function (error) {
                console.error('Error', error);
            }
        });

        // Para agregar la opción por defecto cuando se carga la página por primera vez
        $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
    }

    /* 
    ███████╗███████╗██╗     ███████╗ ██████╗ ██████╗██╗ ██████╗ ███╗   ██╗     ██████╗ ██████╗ ████████╗██╗ ██████╗ █████╗ 
    ██╔════╝██╔════╝██║     ██╔════╝██╔════╝██╔════╝██║██╔═══██╗████╗  ██║    ██╔═══██╗██╔══██╗╚══██╔══╝██║██╔════╝██╔══██╗
    ███████╗█████╗  ██║     █████╗  ██║     ██║     ██║██║   ██║██╔██╗ ██║    ██║   ██║██████╔╝   ██║   ██║██║     ███████║
    ╚════██║██╔══╝  ██║     ██╔══╝  ██║     ██║     ██║██║   ██║██║╚██╗██║    ██║   ██║██╔═══╝    ██║   ██║██║     ██╔══██║
    ███████║███████╗███████╗███████╗╚██████╗╚██████╗██║╚██████╔╝██║ ╚████║    ╚██████╔╝██║        ██║   ██║╚██████╗██║  ██║
    ╚══════╝╚══════╝╚══════╝╚══════╝ ╚═════╝ ╚═════╝╚═╝ ╚═════╝ ╚═╝  ╚═══╝     ╚═════╝ ╚═╝        ╚═╝   ╚═╝ ╚═════╝╚═╝  ╚═╝
                                                                                                                        
    */

    //las opticas aparecen si el cliente clica en la ciudad
    function getOpticaSelectCity() {

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

    //En caso que haya una unica tienda se ejecuta esta función llamada en la función getCityBySelectState()
    function putOpticasByProvincia(city) {
        $.ajax({
            url: getOpticasByProvinciaRoute, // Ruta definida en el archivo Blade
            type: 'POST',
            data: {
                ciudad: city,
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


    //si pasamos la optica se colocará por esta función
    function putOpticasByWeblogin() {
        $.ajax({
            url: getOpticasByWebloginAndOptica,
            method: 'POST',
            data: {
                'weblogin': $('#_weblogin').val(),
                'optica': $('#_optica').val(),
                _token: csrfToken
            },
            success: function (response) {

                console.log(response);
                $('#optica').empty();
                if (response.length == 1) {
                    $.each(response, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                } else {
                    // Agregar opción por defecto
                    $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                    // Agregar opciones de ciudades obtenidas del servidor
                    $.each(response, function (key, value) {
                        $('#optica').append('<option name="optica" value="' + value.codigo + '">' + value.d29 + ' - ' + value.d23 + '</option>');
                    });
                }

            },
            error: function (error) {
                console.error('Error', error);
            }
        });

        // Para agregar la opción por defecto cuando se carga la página por primera vez
        $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
    }


});
