var dispositivo = window.screen.width;

$(document).ready(function () {

    var weblogin = $('#_weblogin').val();
    var allStore = $('#_allStore').val();
    var optica = $('#_optica').val();

    console.log(promocional);


    //condicional según la ruta que se pase

    if (weblogin && optica) {
        putOpticasByWeblogin();
    } else if (weblogin || allStore) {
        putOpticaByweblogin();
    } else {
        getCityBySelectState();
        getOpticaSelectCity();
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
            if($('#landing').val()!='practicasNOG'){
                $('#animationdivIcon').removeClass('d-none');
            }
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

    $('#provincias,#provincias1').on('change', function () {
        var provinciaId = $(this).val();

        $('#optica').empty();//limpia el select ciudad
        if($('#landing').val()=='practicasNOG'){
            $('#optica2').empty();//limpia el select ciudad
            $('#optica3').empty();//limpia el select ciudad
        }
        $('#animationdivIcon').addClass('d-none');//aplica el d-none al icono de mapa
        $('#ciudad').removeClass('readonly-select');
        $('#optica').removeClass('readonly-select');

        if (provinciaId) {
            $.ajax({
                url: getLocalidadByProvinciaRoute, // Ruta definida en el archivo Blade
                type: 'POST',
                data: {
                    provincias: provinciaId,
                    promocional: $('#promocional').val(),
                    landing: $('#landing').val(),
                    _token: csrfToken // Token CSRF definido en el archivo Blade llamado foorte
                },
                success: function (data) {

                    $('#ciudad').empty();

                    if (data.length == 1) {
                        // Si solo hay una ciudad, se selecciona automáticamente
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
                        if($('#landing').val()=='practicasNOG'){
                            $('#ciudad').append('<option value="">' + seleccionaUnaCiudadPracticasText + '</option>');
                        }else{
                            $('#ciudad').append('<option value="">' + seleccionaUnaCiudadText + '</option>');
                        }

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
            if($('#landing').val()=='practicasNOG'){
                $('#ciudad').append('<option value="">' + seleccionaUnaCiudadPracticasText + '</option>');
            }else{
                $('#ciudad').append('<option value="">' + seleccionaUnaCiudadText + '</option>');
            }
        }
    });

    // Para agregar la opción por defecto cuando se carga la página por primera vez
    if($('#landing').val()=='practicasNOG'){
        $('#ciudad').append('<option value="">' + seleccionaUnaCiudadPracticasText + '</option>');
    }else{
        $('#ciudad').append('<option value="">' + seleccionaUnaCiudadText + '</option>');
    }

    $('#optica')

}



//En caso que haya una unica tienda se ejecuta esta función llamada en la función getCityBySelectState()
function putOpticasByProvincia(city) {
    $.ajax({
        url: getOpticasByProvinciaRoute, // Ruta definida en el archivo Blade
        type: 'POST',
        data: {
            ciudad: city,
            promocional: $('#promocional').val(),
            landing: $('#landing').val(),
            _token: csrfToken
        },
        success: function (data) {            

            $('#optica').empty();
            if($('#landing').val()=='practicasNOG'){
                $('#optica2').empty();
                $('#optica3').empty();     
                $('#optica').on('change', function () {
                    const texto = $(this).find('option:selected').text();
                    $('#optica_texto').val(texto);
                    actualizarOpciones(data);
                });    
                $('#optica2').on('change', function () {
                    const texto = $(this).find('option:selected').text();
                    $('#optica2_texto').val(texto);
                    actualizarOpciones(data);
                });
                $('#optica3').on('change', function () {
                    actualizarOpciones(data);
                    const texto = $(this).find('option:selected').text();
                    $('#optica3_texto').val(texto);
                });          
            }        
            
            if (data.length == 1) {
                $.each(data, function (key, value) {
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
                    $('#optica').append('<option name="optica" value="' + value.tienda + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                    $('#optica_texto').val(value.d29 + ' - ' + value.d23 + ' - ' + value.d3);
                    $('a[id=coordsGoogleMaps]').attr('href', 'https://www.google.com/maps/search/?api=1&query=' + value.d29 + ' ' + value.d3 + ' ' + value.d23);
                    $('#optica').addClass('readonly-select');
                    if($('#landing').val()=='practicasNOG'){
                        $('#optica2').addClass('d-none');
                        $('#optica3').addClass('d-none');
                    }
                    if($('#landing').val()=='practicasNOG'){
                        $(".icon-map").removeClass("d-none");
                    }
                    $('#animationdivIcon').removeClass('d-none');
                    $(".icon-map").removeClass("rotate-in-center");
                });
            } else {                             
                if($('#landing').val()=='practicasNOG'){
                    $(".icon-map").addClass('d-none');
                }
                $('#animationdivIcon').addClass('d-none');
                if($('#landing').val()=='practicasNOG'){
                    $('#optica2').removeClass('d-none');
                    if (data.length == 2) {
                        $('#optica3').addClass('d-none'); // o .hide()
                    } else {
                        $('#optica3').removeClass('d-none'); // por si se ocultó antes
                    }
                    $('#optica2').removeClass('readonly-select');
                    $('#optica3').removeClass('readonly-select');
                    $('#optica2').append('<option value="">' + seleccionaOptica2 + '</option>');
                    $('#optica3').append('<option value="">' + seleccionaOptica3 + '</option>');                 
                }
                $('#optica').removeClass('readonly-select');
                // Agregar opción por defecto
                if($('#landing').val()=='practicasNOG'){
                    $('#optica').append('<option value="">' + seleccionaOptica1 + '</option>');
                }else{
                    $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                }
            
                $.each(data, function (key, value) {
                    const optionHtml = '<option value="' + value.tienda + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>';
                    $('#optica').append(optionHtml);
                    if($('#landing').val()=='practicasNOG'){
                        $('#optica2').append(optionHtml);
                        $('#optica3').append(optionHtml);
                    }
            
                    $('#_weblogin').val(value.weblogin);
                    $('#_optica').val(value.tienda);
                });
            
                // Aplicar filtrado inicial si ya hay una selección
                const seleccionada = $('#optica').val();
                if (seleccionada && $('#landing').val()=='practicasNOG') {
                    $('#optica2 option[value="' + seleccionada + '"]').hide();
                    $('#optica3 option[value="' + seleccionada + '"]').hide();
                }
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

function actualizarOpciones(data) { 
    const texto1 = $('#optica option:selected').text().trim();
    const texto2 = $('#optica2 option:selected').text().trim();
    const texto3 = $('#optica3 option:selected').text().trim();   

    // Primero mostramos todas las opciones de todos los selects
    $('#optica option, #optica2 option, #optica3 option').each(function () {
        if ($(this).val()) $(this).show();
    });

    // Por cada item del array data, construimos el texto como está en los <option>
    data.forEach(function(item) {
        const textoOptica = `${item.d29} - ${item.d23} - ${item.d3}`.trim();

        // Ocultamos este texto en los selects donde ya esté seleccionado en otro
        if (textoOptica === texto1 || textoOptica === texto2 || textoOptica === texto3) {
            // Ocultar en #optica si está seleccionado en 2 o 3
            if (textoOptica === texto2 || textoOptica === texto3) {
                $('#optica option').filter(function () {
                    return $(this).text().trim() === textoOptica;
                }).hide();
            }

            // Ocultar en #optica2 si está seleccionado en 1 o 3
            if (textoOptica === texto1 || textoOptica === texto3) {
                $('#optica2 option').filter(function () {
                    return $(this).text().trim() === textoOptica;
                }).hide();
            }

            // Ocultar en #optica3 si está seleccionado en 1 o 2
            if (textoOptica === texto1 || textoOptica === texto2) {
                $('#optica3 option').filter(function () {
                    return $(this).text().trim() === textoOptica;
                }).hide();
            }
        }
    });
}

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
                    promocional: $('#promocional').val(),
                    landing: $('#landing').val(),
                    _token: csrfToken // Token CSRF definido en el archivo Blade
                },
                success: function (data) {                    

                    $('#optica').empty();
                    if($('#landing').val()=='practicasNOG'){
                        $('#optica2').empty();
                        $('#optica3').empty();
                        $('#optica').on('change', function () {
                            const texto = $(this).find('option:selected').text();
                            $('#optica_texto').val(texto);
                            actualizarOpciones(data);
                        });                    
                        $('#optica2').on('change', function () {
                            const texto = $(this).find('option:selected').text();
                            $('#optica2_texto').val(texto);
                            actualizarOpciones(data);
                        });
                        $('#optica3').on('change', function () {
                            const texto = $(this).find('option:selected').text();
                            $('#optica3_texto').val(texto);
                            actualizarOpciones(data);
                        });                    
                    }
                    
                    if (data.length == 1) {
                        $.each(data, function (key, value) {
                            $('#optica').append('<option name="optica" value="' + value.tienda + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
                            $('#optica_texto').val(value.d29 + ' - ' + value.d23 + ' - ' + value.d3);
                            $('#optica').addClass('readonly-select');
                            if($('#landing').val()=='practicasNOG'){
                                $('#optica2').addClass('d-none');
                                $('#optica3').addClass('d-none');
                            }
                            $('#animationdivIcon').removeClass('d-none');
                            if($('#landing').val()=='practicasNOG'){
                                $(".icon-map").removeClass("d-none");
                            }
                            $(".icon-map").removeClass("rotate-in-center");
                            $('a[id=coordsGoogleMaps]').attr('href', 'https://www.google.com/maps/search/?api=1&query=' + value.d29 + ' ' + value.d3 + ' ' + value.d23);
                            $('#_weblogin').val(value.weblogin);
                            $('#_optica').val(value.tienda);
                        });
                    } else {                      
                        if($('#landing').val()=='practicasNOG'){
                            $(".icon-map").addClass('d-none');
                        }
                        $('#animationdivIcon').addClass('d-none');
                        if($('#landing').val()=='practicasNOG'){
                            $('#optica2').removeClass('d-none');
                            if (data.length == 2) {
                                $('#optica3').addClass('d-none');
                            } else {
                                $('#optica3').removeClass('d-none');
                            } 
                            $('#optica2').removeClass('readonly-select');
                            $('#optica3').removeClass('readonly-select');
                            $('#optica2').append('<option value="">' + seleccionaOptica2 + '</option>');
                            $('#optica3').append('<option value="">' + seleccionaOptica3 + '</option>');
                        }
                        $('#optica').removeClass('readonly-select');
                        // Agregar opción por defecto
                        if($('#landing').val()=='practicasNOG'){
                            $('#optica').append('<option value="">' + seleccionaOptica1 + '</option>');
                        }else{
                            $('#optica').append('<option value="">' + seleccionaUnaOpticaText + '</option>');
                        }
                    
                        $.each(data, function (key, value) {
                            const optionHtml = '<option value="' + value.tienda + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>';
                            $('#optica').append(optionHtml);
                            if($('#landing').val()=='practicasNOG'){
                                $('#optica2').append(optionHtml);
                                $('#optica3').append(optionHtml);
                            }
                    
                            $('#_weblogin').val(value.weblogin);
                            $('#_optica').val(value.tienda);                 
                        });
                    
                        // Aplicar filtrado inicial si ya hay una selección
                        const seleccionada = $('#optica').val();                        
                        if (seleccionada && $('#landing').val()=='practicasNOG') {
                            $('#optica2 option[value="' + seleccionada + '"]').hide();
                            $('#optica3 option[value="' + seleccionada + '"]').hide();
                        }
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
            'allStore': $('#_allStore').val(),
            promocional: $('#promocional').val(),
            landing: $('#landing').val(),
            _token: csrfToken
        },
        success: function (response) {

            $('#optica').empty();
            if($('#landing').val()=='practicasNOG'){
                $('#optica2').empty();
                $('#optica3').empty();
            }
            if (response.length == 1) {
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
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
                    $('#optica').append('<option name="optica" value="' + value.tienda + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
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
            promocional: $('#promocional').val(),
            landing: $('#landing').val(),
            _token: csrfToken
        },
        success: function (response) {

            console.log(response);
            $('#optica').empty();
            if($('#landing').val()=='practicasNOG'){
                $('#optica2').empty();
                $('#optica3').empty();
            }
            $('#_opticaAndWeblogin').val('true');
            if (response.length == 1) {
                $.each(response, function (key, value) {
                    $('#optica').append('<option name="optica" value="' + value.tienda + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
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
                    $('#optica').append('<option name="optica" value="' + value.tienda + " " + value.weblogin + " " + value.weblogin + '">' + value.d29 + ' - ' + value.d23 + ' - ' + value.d3 + '</option>');
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

