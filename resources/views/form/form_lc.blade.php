<div id="contAllForm" class="contenedor-form w-100 h-100 d-flex justify-content-center align-items-center">

    <form id="formMacroContactologia" class="w-100 p-0 m-0" action="" method="POST">

        @csrf
        <input type="hidden" id="language" name="language" value="{{ $data['idioma'] }}">
        <input type="hidden" id="typeLC" name="typeLC" value="{{ $data['typeLC'] }}">
        <input type="hidden" id="clicodi" name="clicodi" value="{{ $data['clicodi'] }}">
        <input type="hidden" id="url_landing" name="url_landing" value="{{ $data['url'] }}">
        <input type="hidden" id="origen" name="origen" value="{{ $data['origin'] }}">
        <input type="hidden" id="_weblogin" name="_weblogin" value="{{ $data['weblogin'] }}">
        <input type="hidden" id="_optica" name="_optica" value="{{ $data['optica'] }}">
        <input type="hidden" id="_opticaAndWeblogin" name="_opticaAndWeblogin" value="">
        <input type="hidden" id="_logo" name="_logo" value="{{ $data['logo'] }}">
        <input type="hidden" id="_test" name="_test" value="{{ $data['test'] }}">


        <div class="d-flex flex-column justify-content-center align-items-start mb-5">
            <p class="text-top-form">{{ __('form_lc_translation.Pide_cita_rellenando') }}</p>
            <p class="text-top-form">{{ __('form_lc_translation.Producto_adquirido') }}</p>
        </div>


        <div>

            @if ($data['axaptamailparams'])
                <div class="producto_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="1100">

                    <input class="form-control @error('producto') is-invalid @enderror" type="text" name="producto"
                        id="producto" disabled value="{{ $data['axaptamailparams'][1] }}">
                    <input type="hidden" name="productoHidden" value="{{ $data['axaptamailparams'][1] }}">
                </div>
            @endif

            <div class="nombre_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1100">

                <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre"
                    id="nombre" placeholder='{{ __('form_lc_translation.Nombre') }}' value="{{ $data['axaptamail']['CLI_Nom'] }}">
            </div>

            <div class="apellidos_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1300">

                <input class="form-control @error('apellidos') is-invalid @enderror" type="text" name="apellido"
                    id="apellidos" placeholder='{{ __('form_lc_translation.Apellidos') }}' value="{{ $data['axaptamail']['CLI_Cognom1'] }}">

            </div>

            <div class="apellidos2_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="500" data-aos-duration="1300">

                <input class="form-control @error('apellidos') is-invalid @enderror" type="text" name="apellido2"
                    id="apellidos2" placeholder='{{ __('form_lc_translation.Apellidos2') }}' value="{{ $data['axaptamail']['CLI_Cognom2'] }}">

            </div>

            <div class="direccion_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1300">

                <input class="form-control @error('direccion') is-invalid @enderror" type="text" name="direccion"
                    id="direccion" placeholder='{{ __('form_lc_translation.direccion') }}' value="{{ $data['axaptamail']['Direc'] }}">

            </div>

            <div class="provin_codPostal_div row mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="500" data-aos-duration="1300">

                <div class="col-md-6">
                    <input class="form-control @error('prov_cli') is-invalid @enderror" type="text" name="prov_cli"
                        id="prov_cli" placeholder='{{ __('form_lc_translation.provincia') }}' value="{{ $data['axaptamail']['CLI_Provincia'] }}">
                </div>

                <div class="col-md-6">
                    <input class="form-control @error('cp_cli') is-invalid @enderror" type="text" name="cp_cli"
                        id="cp_cli" placeholder='{{ __('form_lc_translation.cp') }}' value="{{ $data['axaptamail']['CLI_CodiPostal'] }}">
                </div>

            </div>

            <div class="poblacion_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="500" data-aos-duration="1300">

                <input class="form-control @error('poblacion') is-invalid @enderror" type="text" name="poblacion"
                    id="poblacion" placeholder='{{ __('form_lc_translation.poblacion') }}' value="{{ $data['axaptamail']['CLI_Localitat'] }}">

            </div>

            <div class="movil_fijo_div row mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="500" data-aos-duration="1700">

                <div class="col-md-6">
                    <input class="form-control @error('movil') is-invalid @enderror" type="text" name="movil"
                        id="movil" placeholder='{{ __('form_lc_translation.Telefono') }}' value="{{ $data['axaptamail']['Telf'] }}">
                </div>

                <div class="col-md-6">
                    <input class="form-control @error('fijo') is-invalid @enderror" type="text" name="fijo"
                        id="fijo" placeholder='{{ __('form_lc_translation.TelefonoFijo') }}'>
                </div>
            </div>

            <div class="email_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1500">

                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                    id="email" placeholder='{{ __('form_lc_translation.Email') }}' value="{{ $data['axaptamail']['CLI_Email'] }}">

            </div>

            <div class="cont-botton-police">

                <div class="form-check form-check-reverse mt-5 p-0">
                    <input class="custom-checkbox" type="checkbox" value="1" name="check-poli"
                        id="reverseCheck1">

                    <label class="form-check-label" for="reverseCheck1">
                        <span>{{ __('form_lc_translation.Aceptar_politicas_privacidad_1') }}</span>
                        <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" target="_blank"
                            style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                            {{ __('form_lc_translation.Aceptar_politicas_privacidad_2') }}
                        </a>
                    </label>
                </div>


                <table class="table-optica-map">
                    <tr>
                        <td id="table-input-item">
                            <div id="span-optica-axapta">
                                <table class="table-optica-map">
                                    <tr>
                                        <td id="table-input-item-name" data-name="{{ $data['centros'][0]->d29 }}">
                                            {{ __('form_lc_translation.centro') }}: <span class="text-uppercase">{{ $data['centros'][0]->d29 }}</span></td>
                                    </tr>
                                    <tr>
                                        <td id="table-input-item-address" data-address="{{ $data['centros'][0]->d23 }}. {{ $data['centros'][0]->d3 }}" class="table-input-item ">
                                            {{ __('form_lc_translation.direccion') }}: <span class="text-uppercase">{{ $data['centros'][0]->d23 }}. {{ $data['centros'][0]->d3 }}</span></td>
                                    </tr>
                                    <tr>
                                        <td id="table-input-item" class="table-input-item">{{ __('form_lc_translation.telefono') }}: <span class="text-uppercase">{{ $data['centros'][0]->d6 }}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <a href="" id="coordsGoogleMaps" target="_blank"><img class="icon-map"
                                    src="{{ asset($data['rutaAsset'] . 'assets/iconos/map/maps.png') }}" /></a>
                        </td>
                    </tr>
                </table>

                <div class="b-pedir-citas mt-5">

                    <button id="form" class="btn btn-color">{{ __('form_lc_translation.Pedir_cita') }}</button>

                </div>

            </div>
        </div>


    </form>

    {{-- 
    ███╗   ███╗███████╗     ██╗     ██████╗ ██████╗  █████╗  ██████╗██╗ █████╗ ███████╗
    ████╗ ████║██╔════╝     ██║    ██╔════╝ ██╔══██╗██╔══██╗██╔════╝██║██╔══██╗██╔════╝
    ██╔████╔██║███████╗     ██║    ██║  ███╗██████╔╝███████║██║     ██║███████║███████╗
    ██║╚██╔╝██║╚════██║██   ██║    ██║   ██║██╔══██╗██╔══██║██║     ██║██╔══██║╚════██║
    ██║ ╚═╝ ██║███████║╚█████╔╝    ╚██████╔╝██║  ██║██║  ██║╚██████╗██║██║  ██║███████║
    ╚═╝     ╚═╝╚══════╝ ╚════╝      ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝╚═╝╚═╝  ╚═╝╚══════╝
                                                                                       
    --}}

    <div id="gracias" class="d-none">

        <div class="">

            <div class="d-flex flex-column text-center w-100">

                <span class="">{{ __('form_lc_translation.titol-gracias') }}</span>
                <span class="mt-4">{{ __('form_lc_translation.parrafo-1') }}</span>
                <span class="mt-4">{{ __('form_lc_translation.parrafo-2') }}</span>

                <hr>

                <div class="b-volver mt-5">
                    <button class="btn btn-color" id="volver-form">{{ __('form_lc_translation.volver') }}</button>
                </div>

            </div>

        </div>

    </div>

</div>



{{-- 
██╗   ██╗ █████╗ ██╗     ██╗██████╗  █████╗ ██████╗     ███████╗██████╗ ██████╗  ██████╗ ██████╗ ███████╗███████╗
██║   ██║██╔══██╗██║     ██║██╔══██╗██╔══██╗██╔══██╗    ██╔════╝██╔══██╗██╔══██╗██╔═══██╗██╔══██╗██╔════╝██╔════╝
██║   ██║███████║██║     ██║██║  ██║███████║██████╔╝    █████╗  ██████╔╝██████╔╝██║   ██║██████╔╝█████╗  ███████╗
╚██╗ ██╔╝██╔══██║██║     ██║██║  ██║██╔══██║██╔══██╗    ██╔══╝  ██╔══██╗██╔══██╗██║   ██║██╔══██╗██╔══╝  ╚════██║
 ╚████╔╝ ██║  ██║███████╗██║██████╔╝██║  ██║██║  ██║    ███████╗██║  ██║██║  ██║╚██████╔╝██║  ██║███████╗███████║
  ╚═══╝  ╚═╝  ╚═╝╚══════╝╚═╝╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝    ╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═╝╚══════╝╚══════╝
                                                                                                                 
--}}

<script>
    $('#form').off().on('click', function(e) {
        e.preventDefault();
        var formData = $('#formMacroContactologia').serialize();

        $.ajax({
            url: '{{ route('validateFormLC') }}', // Ruta de Laravel que maneja la validación
            type: 'POST',
            data: formData + '&_token={{ csrf_token() }}', // Agrega el token CSRF
            success: function(response) {
                $('#formMacroContactologia').addClass('d-none');
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

        // Limpiar los campos del formulario
        if (opticaAndWeblogin === 'true') {
            $('#formMacroContactologia').find('input[type=text], input[type=email]').val('');
        } else {
            $('#formMacroContactologia').find('input[type=text], input[type=email], select').val('');

            // Limpiar selects de ciudad y óptica
            $('#ciudad').html('<option value="">Selecciona una ciudad</option>');
            $('#optica').html('<option value="">Selecciona una óptica</option>');

            // Quita la invalidación del select cuando es un solo campo
            $('#optica').removeClass('readonly-select');

            // Oculta el icono del mapa
            $('#animationdivIcon').addClass('d-none');
        }

        // Limpiar el checkbox
        $('#formMacroContactologia').find('input[type=checkbox]').prop('checked', false);

    })
</script>
