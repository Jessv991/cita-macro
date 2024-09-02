$(document).ready(function () {
    
    var weblogin = $('#_weblogin').val();
    var optica = $('#_optica').val();


    //condicional según la ruta que se pase

    if (weblogin && optica) {
        putOpticasByWeblogin();
    } else if (weblogin) {
        putOpticaByweblogin();
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
    ██████╗  ██████╗ ████████╗ ██████╗ ███╗   ██╗    ███████╗██╗      ██████╗ ████████╗ █████╗ ███╗   ██╗████████╗███████╗
    ██╔══██╗██╔═══██╗╚══██╔══╝██╔═══██╗████╗  ██║    ██╔════╝██║     ██╔═══██╗╚══██╔══╝██╔══██╗████╗  ██║╚══██╔══╝██╔════╝
    ██████╔╝██║   ██║   ██║   ██║   ██║██╔██╗ ██║    █████╗  ██║     ██║   ██║   ██║   ███████║██╔██╗ ██║   ██║   █████╗  
    ██╔══██╗██║   ██║   ██║   ██║   ██║██║╚██╗██║    ██╔══╝  ██║     ██║   ██║   ██║   ██╔══██║██║╚██╗██║   ██║   ██╔══╝  
    ██████╔╝╚██████╔╝   ██║   ╚██████╔╝██║ ╚████║    ██║     ███████╗╚██████╔╝   ██║   ██║  ██║██║ ╚████║   ██║   ███████╗
    ╚═════╝  ╚═════╝    ╚═╝    ╚═════╝ ╚═╝  ╚═══╝    ╚═╝     ╚══════╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝
                                                                                                                          
    */

    if (dispositivo >= 992) {

        $('#btn-flotante').on('click', function (e) {

            e.preventDefault();

            $('.card-style').removeClass('col-lg-3').addClass('col-lg-6');
            $('.lado-izq').addClass('col-lg-8').css({ position: 'relative', width: '100%', right: '0%' }).animate({ width: '66.66666667%', right: '0%' }, 1000);
            $('.lado-der').removeClass('d-none').css({ position: 'relative', right: '-100%' }).show().animate({ right: '0%' }, 1500);
            $('.carrusel-inner').attr('style', 'height: 500px !important');
            $('.redes-style').attr('style', 'width: 5.5% !important');
            $('.blog-style').attr('style', 'width: 4.3% !important');
            $('.style-tarj').removeClass('w-50').addClass('w-75');
            $('.btn-flotante').addClass('d-none');
            $('.med-img-circle').attr('style', 'width: 38% !important');
        });

        $('.btn-close').on('click', function (e) {

            e.preventDefault();

            $('.btn-flotante').removeClass('d-none');
            $('.card-style').removeClass('col-lg-6').addClass('col-lg-3');
            $('.lado-der').addClass('d-none');
            $('.lado-izq').css({ position: 'relative', width: '66.66666667%', left: '0%' }).animate({ width: '100%', left: '0%' }, 1000);
            $('.carrusel-inner').attr('style', 'height: 704px !important');
            $('.redes-style').attr('style', 'width: 3.5% !important');
            $('.blog-style').attr('style', 'width: 2.6% !important');
            $('.style-tarj').removeClass('w-75').addClass('w-50');
            $('.med-img-circle').attr('style', 'width: 64% !important');
        });

    } else {

        $('#btn-flotante').on('click', function (e) {

            e.preventDefault();

            $('#btn-flotante').addClass('d-none');
            $('.form_flotante').removeClass('d-none').fadeOut(1).fadeIn(500);

        });

        $('.btn-close-flotante').on('click', function (e) {

            e.preventDefault();

            $('.form_flotante').fadeOut(500, function () {
                $('.form_flotante').addClass('d-none');
            });

            $('#btn-flotante').removeClass('d-none');

        });

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
                    _token: csrfToken 
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
                        });
                    } else {
                        $('#animationdivIcon').addClass('d-none');
                        // Agregar opción por defecto
                        $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                        // Agregar opciones de ciudades obtenidas del servidor
                        $.each(data, function (key, value) {
                            $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
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
                });
            } else {
                $('#animationdivIcon').addClass('d-none');
                // Agregar opción por defecto
                $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                // Agregar opciones de ciudades obtenidas del servidor
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
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
            if (response.length == 1) {
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                    console.log(value);
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
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
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
