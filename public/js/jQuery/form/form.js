var dispositivo = window.screen.width;

var fullUrl = $('#url_landing').val(); // Paso 1: obtener valor del input

// Paso 2: crear objeto URL
var url = new URL(fullUrl);

// Paso 3: obtener la ruta del path
var pathname = url.pathname; // Ejemplo: "/cita-macro/es/cita-commodity/lc/email/ponferrada/tiecodi_1/..."

// Paso 4: extraer el segmento deseado
var parts = pathname.split('/'); // divide la ruta por '/'
var valorDeseado = parts[4] + '/' + parts[5]; // lc/email está en índice 4 y 5

$(document).ready(function () {

    var weblogin = $('#_weblogin').val();
    var optica = $('#_optica').val();


    //condicional según la ruta que se pase

    if (weblogin && optica) {
        putOpticasByWeblogin();
    } else if (weblogin) {
        putOpticaByweblogin();
        //getOpticaSelectCity();
    } else {
        getCityBySelectState();
        getOpticaSelectCity()
    }

    //animación del icono de mapa
    $('#optica').on('change', function () {
        var opticaId = $(this).val();
        if (opticaId) {
            $('#animationdivIcon').removeClass('d-none');
            $(".icon-map").removeClass("rotate-in-center");
        } else {
            $('#animationdivIcon').addClass('d-none');
        }
    });


    // Agregar evento change para capturar la opción seleccionada y cambiar la dirección del mapa
    $('#optica').off('change').on('change', function () {
        var selectedOption = $(this).find('option:selected');//capturo la selección
        var value = selectedOption.val();//cogemos elvalor, para validar que ya haya un valor y hacer condicional
        var text = selectedOption.text();// cogemos el texto de la selección
        if (value) {
            var address = text.split(' - ')[0];//lo spliteyamos y le quitamos los '-'
            $('a[id=coordsGoogleMaps]').attr('href', 'https://www.google.com/maps/search/?api=1&query=' + address);
            $('#animationdivIcon').removeClass('d-none');
            $(".icon-map").removeClass("rotate-in-center");
        } else {
            $('#animationdivIcon').addClass('d-none');
        }
    });

    /* 
    ███████╗███████╗███████╗ ██████╗████████╗ ██████╗     ██╗  ██╗ ██████╗ ██╗   ██╗███████╗██████╗ 
    ██╔════╝██╔════╝██╔════╝██╔════╝╚══██╔══╝██╔═══██╗    ██║  ██║██╔═══██╗██║   ██║██╔════╝██╔══██╗
    █████╗  █████╗  █████╗  ██║        ██║   ██║   ██║    ███████║██║   ██║██║   ██║█████╗  ██████╔╝
    ██╔══╝  ██╔══╝  ██╔══╝  ██║        ██║   ██║   ██║    ██╔══██║██║   ██║╚██╗ ██╔╝██╔══╝  ██╔══██╗
    ███████╗██║     ███████╗╚██████╗   ██║   ╚██████╔╝    ██║  ██║╚██████╔╝ ╚████╔╝ ███████╗██║  ██║
    ╚══════╝╚═╝     ╚══════╝ ╚═════╝   ╚═╝    ╚═════╝     ╚═╝  ╚═╝ ╚═════╝   ╚═══╝  ╚══════╝╚═╝  ╚═╝
    
    para botón flotante pantallas pequeñas
    */

    if (dispositivo <= 991) {

        setInterval(function () {
            // Añade la clase para simular hover
            $('.btn-flotante').addClass('btn-flotante-table');
            $('.textPC').addClass('textPC-table');
            $('.cls-1').addClass('cls-1-table');
            $('.bfi').attr('style', 'margin-left: -2px !important');

            // Remueve la clase después de un pequeño tiempo para simular el fin del hover
            setTimeout(function () {
                $('.btn-flotante').removeClass('btn-flotante-table');
                $('.textPC').removeClass('textPC-table');
                $('.cls-1').removeClass('cls-1-table');
            }, 1000); // Ajusta el tiempo que el hover permanece activo
        }, 5000); // Cada 5 segundos

    }

    if(valorDeseado === 'lc/email'){

        $('#form').on('click', function(e) {
        e.preventDefault();
        var formData = $('#formMacroContactologia').serialize();

        $.ajax({
            url: validateFormLC, // Ruta de Laravel que maneja la validación
            type: 'POST',
            data: formData, // Agrega el token CSRF
            _token: csrfToken,
            success: function(response) {
                $('#formMacroContactologia').addClass('d-none');
                $('#form').prop('disabled', true);
                $('#gracias').removeClass('d-none');
                // Manejar la respuesta del servidor, por ejemplo, redirigir
            },
            error: function(xhr, status, error) {

                // Manejar errores si es necesario
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    // Limpiar mensajes de error anteriores
                    $('#formMacroContactologia .error').remove(); //remueve los msj de error
                    $('input').removeClass(
                        'border-1 border-bottom border-danger'); //remueve el style de los input
                    $('select').removeClass(
                        'border-1 border-bottom border-danger'); //remueve el style de los select

                    // Iterar sobre los errores y mostrarlos junto a los campos correspondientes
                    $.each(errors, function(key, value) {
                        var $input = $('#formMacroContactologia').find('[name="' + key +
                            '"]');
                        $input.addClass('border-1 border-bottom border-danger');
                        $input.next('.error').remove();
                        $input.after(
                            '<span class="error text-danger" style="font-size: 12px;">' +
                            value[0] + '</span>'); //este es el msj de error
                    });
                } else {
                    console.error(error); // Manejar otros tipos de errores si es necesario
                }
            }
        });
    });

    $('#volver-form').on('click', function(e) {
        e.preventDefault();

        $('#gracias').addClass('d-none');
        $('#formMacroContactologia .error').remove(); //remuevo los msjs de error que hayan quedado
        $('input').removeClass('border-1 border-bottom border-danger'); //remueve el style de los input

        $('#formMacroContactologia').removeClass('d-none');

        var opticaAndWeblogin = $('#_opticaAndWeblogin').val();
        $('#form').prop('disabled', false);

        // Limpiar el checkbox
        $('#formMacroContactologia').find('input[type=checkbox]').prop('checked', false);

    })

    }

});


/* 
███████╗███████╗██╗     ███████╗ ██████╗ ██████╗██╗ ██████╗ ███╗   ██╗     ██████╗██╗██╗   ██╗██████╗  █████╗ ██████╗ 
██╔════╝██╔════╝██║     ██╔════╝██╔════╝██╔════╝██║██╔═══██╗████╗  ██║    ██╔════╝██║██║   ██║██╔══██╗██╔══██╗██╔══██╗
███████╗█████╗  ██║     █████╗  ██║     ██║     ██║██║   ██║██╔██╗ ██║    ██║     ██║██║   ██║██║  ██║███████║██║  ██║
╚════██║██╔══╝  ██║     ██╔══╝  ██║     ██║     ██║██║   ██║██║╚██╗██║    ██║     ██║██║   ██║██║  ██║██╔══██║██║  ██║
███████║███████╗███████╗███████╗╚██████╗╚██████╗██║╚██████╔╝██║ ╚████║    ╚██████╗██║╚██████╔╝██████╔╝██║  ██║██████╔╝
╚══════╝╚══════╝╚══════╝╚══════╝ ╚═════╝ ╚═════╝╚═╝ ╚═════╝ ╚═╝  ╚═══╝     ╚═════╝╚═╝ ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝ 
                                                                                                                      
*/


//si el cliente selecciona la provincia se ejecuta esta función
function getCityBySelectState() {

    $('#provincias').on('change', function () {
        var provinciaId = $(this).val();

        $('#optica').empty();//limpia el select ciudad
        $('#animationdivIcon').addClass('d-none');//aplica el d-none al icono de mapa
        $('#ciudad').removeClass('readonly-select');
        $('#optica').removeClass('readonly-select');

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
                            $('#_weblogin').val(value.weblogin);
                            $('#_optica').val(value.tienda);
                            $('#ciudad').append('<option value="' + value.d3 + '" selected>' + value.d3 + '</option>');
                            $('#ciudad').addClass('readonly-select');

                            //en caso de que haya sólo una tienda ejecutamos esta función
                            putOpticasByProvincia(value.d3);
                        });
                    } else {
                        // Agregar opción por defecto
                        $('#ciudad').append('<option value="">' + seleccionaUnaCiudadText + '</option>');

                        // Agregar opciones de ciudades obtenidas del servidor
                        $.each(data, function (key, value) {
                            $('#_weblogin').val(value.weblogin);
                            $('#_optica').val(value.tienda);
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



//En caso que haya una unica tienda se ejecuta esta función llamada en la función getCityBySelectState()
function putOpticasByProvincia(city) {
    $.ajax({
        url: getOpticasByProvinciaRoute, // Ruta definida en el archivo Blade
        type: 'POST',
        data: {
            ciudad: city,
            _token: csrfToken
        },
        success: function (data) {

            $('#optica').empty();
            if (data.length == 1) {
                $.each(data, function (key, value) {
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                    $('a[id=coordsGoogleMaps]').attr('href', 'https://www.google.com/maps/search/?api=1&query=' + value.d29 + ' ' + value.d3 + ' ' + value.d23);
                    $('#optica').addClass('readonly-select');
                    $('#animationdivIcon').removeClass('d-none');
                    $(".icon-map").removeClass("rotate-in-center");
                });
            } else {
                $('#animationdivIcon').addClass('d-none');
                // Agregar opción por defecto
                $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                // Agregar opciones de ciudades obtenidas del servidor
                $.each(data, function (key, value) {
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                });
            }

        }
    });
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
                            $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                            $('#optica').addClass('readonly-select');
                            $('#animationdivIcon').removeClass('d-none');
                            $(".icon-map").removeClass("rotate-in-center");
                            $('a[id=coordsGoogleMaps]').attr('href', 'https://www.google.com/maps/search/?api=1&query=' + value.d29 + ' ' + value.d3 + ' ' + value.d23);
                            $('#_weblogin').val(value.weblogin);
                            $('#_optica').val(value.tienda);
                        });
                    } else {
                        $('#animationdivIcon').addClass('d-none');
                        // Agregar opción por defecto
                        $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                        // Agregar opciones de ciudades obtenidas del servidor
                        $.each(data, function (key, value) {
                            $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                            $('#_weblogin').val(value.weblogin);
                            $('#_optica').val(value.tienda);
                        });

                    }

                }
            });
        }
    });

    // Para agregar la opción por defecto cuando se carga la página por primera vez
    $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');

}

/*  ██████╗ ██████╗ ████████╗██╗ ██████╗ █████╗     ██████╗  ██████╗ ██████╗     ██╗    ██╗███████╗██████╗ ██╗      ██████╗  ██████╗ ██╗███╗   ██╗
   ██╔═══██╗██╔══██╗╚══██╔══╝██║██╔════╝██╔══██╗    ██╔══██╗██╔═══██╗██╔══██╗    ██║    ██║██╔════╝██╔══██╗██║     ██╔═══██╗██╔════╝ ██║████╗  ██║
   ██║   ██║██████╔╝   ██║   ██║██║     ███████║    ██████╔╝██║   ██║██████╔╝    ██║ █╗ ██║█████╗  ██████╔╝██║     ██║   ██║██║  ███╗██║██╔██╗ ██║
   ██║   ██║██╔═══╝    ██║   ██║██║     ██╔══██║    ██╔═══╝ ██║   ██║██╔══██╗    ██║███╗██║██╔══╝  ██╔══██╗██║     ██║   ██║██║   ██║██║██║╚██╗██║
   ╚██████╔╝██║        ██║   ██║╚██████╗██║  ██║    ██║     ╚██████╔╝██║  ██║    ╚███╔███╔╝███████╗██████╔╝███████╗╚██████╔╝╚██████╔╝██║██║ ╚████║
   ╚═════╝ ╚═╝        ╚═╝   ╚═╝ ╚═════╝╚═╝  ╚═╝    ╚═╝      ╚═════╝ ╚═╝  ╚═╝     ╚══╝╚══╝ ╚══════╝╚═════╝ ╚══════╝ ╚═════╝  ╚═════╝ ╚═╝╚═╝  ╚═══╝
                                                                                                                                                */

//si pasan el weblogin se coloca automáticamente 
function putOpticaByweblogin() {

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
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                    $('a[id=coordsGoogleMaps]').attr('href', 'https://www.google.com/maps/search/?api=1&query=' + value.d29 + ' ' + value.d3 + ' ' + value.d23);
                    $('#optica').addClass('readonly-select');
                    $('#animationdivIcon').removeClass('d-none');
                    $(".icon-map").removeClass("rotate-in-center");
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
                });
            } else {
                $('#animationdivIcon').addClass('d-none');
                // Agregar opción por defecto
                $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                // Agregar opciones de ciudades obtenidas del servidor
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
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


/*  ██████╗ ██████╗ ████████╗██╗ ██████╗ █████╗     ██████╗  ██████╗ ██████╗     ██╗    ██╗███████╗██████╗              ██╗   ██╗    ████████╗██╗███████╗███╗   ██╗██████╗  █████╗ 
   ██╔═══██╗██╔══██╗╚══██╔══╝██║██╔════╝██╔══██╗    ██╔══██╗██╔═══██╗██╔══██╗    ██║    ██║██╔════╝██╔══██╗             ╚██╗ ██╔╝    ╚══██╔══╝██║██╔════╝████╗  ██║██╔══██╗██╔══██╗
   ██║   ██║██████╔╝   ██║   ██║██║     ███████║    ██████╔╝██║   ██║██████╔╝    ██║ █╗ ██║█████╗  ██████╔╝              ╚████╔╝        ██║   ██║█████╗  ██╔██╗ ██║██║  ██║███████║
   ██║   ██║██╔═══╝    ██║   ██║██║     ██╔══██║    ██╔═══╝ ██║   ██║██╔══██╗    ██║███╗██║██╔══╝  ██╔══██╗               ╚██╔╝         ██║   ██║██╔══╝  ██║╚██╗██║██║  ██║██╔══██║
   ╚██████╔╝██║        ██║   ██║╚██████╗██║  ██║    ██║     ╚██████╔╝██║  ██║    ╚███╔███╔╝███████╗██████╔╝██╗██╗██╗       ██║          ██║   ██║███████╗██║ ╚████║██████╔╝██║  ██║
   ╚═════╝ ╚═╝        ╚═╝   ╚═╝ ╚═════╝╚═╝  ╚═╝    ╚═╝      ╚═════╝ ╚═╝  ╚═╝     ╚══╝╚══╝ ╚══════╝╚═════╝ ╚═╝╚═╝╚═╝       ╚═╝          ╚═╝   ╚═╝╚══════╝╚═╝  ╚═══╝╚═════╝ ╚═╝  ╚═╝
                                                                                                                                                                                */


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
            $('#_opticaAndWeblogin').val('true');
            if (response.length == 1) {
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                    $('a[id=coordsGoogleMaps]').attr('href', 'https://www.google.com/maps/search/?api=1&query=' + value.d29 + ' ' + value.d3 + ' ' + value.d23);
                    $('#optica').addClass('readonly-select');
                    $('#animationdivIcon').removeClass('d-none');
                    $(".icon-map").removeClass("rotate-in-center");
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
                });
            } else {
                $('#animationdivIcon').addClass('d-none');
                // Agregar opción por defecto
                $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                // Agregar opciones de ciudades obtenidas del servidor
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
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
