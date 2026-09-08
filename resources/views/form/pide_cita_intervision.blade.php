<div class="contenedor-form w-100 h-100 d-flex justify-content-center align-items-center">

    <form id="formMacroContactologia" class="w-100 p-0 m-0" action="" method="POST">

        @csrf
        <input type="hidden" id="language" name="language" value="{{ $data['idioma'] }}">
        <input type="hidden" id="url_landing" name="url_landing" value="{{ $data['url'] }}">
        <input type="hidden" id="origen" name="origen" value="{{ $data['origin'] }}">
        <input type="hidden" id="_weblogin" name="_weblogin" value="{{ $data['weblogin'] }}">
        <input type="hidden" id="_allStore" name="_allStore" value="{{ $data['allStore'] }}">
        <input type="hidden" id="_optica" name="_optica" value="{{ $data['optica'] }}">
        <input type="hidden" id="_logo" name="_logo" value="{{ $data['logo'] }}">
        <input type="hidden" id="_test" name="_test" value="{{ $data['test'] }}">
        <input type="hidden" id="promocional" name="promocional" value="{{ $data['promocional'] }}">
        <input type="hidden" id="landing" name="landing" value="{{ $data['landing'] }}">

        @if ($data['landing'] === 'intervision_expert_two_for_one')
            <div class="text-start mb-5">
                <p class="text-top-form-anniversary">{{ __('form_translation.anniversary') }}</p>
                <p class="text-top-form-anniversary2">{{ __('form_translation.anniversary2') }}</p>
                <div class="divider-line"></div>
                <p class="text-top-form">{{ __('form_translation.Pide_cita_rellenando2') }}</p>
                <p class="text-top-form">{{ __('form_translation.Pide_cita_rellenando') }}</p>
            </div>
        @else
            <div class="text-start mb-5 mt-3">
                @if ($data['landing'] !== 'promo_progresivas')
                    <p class="text-top-form-anniversary2">{{ __('form_translation.Pide_cita_rellenando2') }}</p>
                @endif
                <p class="text-top-form-anniversary2">{{ __('form_translation.Pide_cita_rellenando') }}</p>
            </div>
        @endif

        <div>
            @if (empty($data['weblogin']) && empty($data['allStore']))
                <div class="provincias_div" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                    data-aos-duration="500">

                    <select class="form-select @error('provincias') is-invalid @enderror" name="provincias"
                        id="provincias">
                        <option value="" selected>{{ __('form_translation.Selecciona_una_provincia') }}</option>
                        @foreach ($data['provincias'] as $provincia)
                            <option value="{{ $provincia->id }}">{{ $provincia->a1 }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="ciudad_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="700">

                    <select class="form-select @error('ciudad') is-invalid @enderror" name="ciudad"
                        id="ciudad"></select>

                </div>
            @endif


            <div class="row">
                <div class="d-flex align-items-center">
                    <div class="optica_div mt-1" data-aos="fade-left" data-aos-anchor="#example-anchor"
                        data-aos-offset="500" data-aos-duration="900">

                        <select class="form-select @error('optica') is-invalid @enderror" name="optica" id="optica">
                            <option value=""></option>
                        </select>

                    </div>

                    <div class="ms-auto d-none" id="animationdivIcon">
                        <a href="" id="coordsGoogleMaps" target="_blank">
                            <svg class="icon-map" viewBox="0 0 49 49">
                                <g style="transform-origin: 50% 50%; transform: rotate(0deg) scale(1, 1);"
                                    class="ldl-scale">
                                    <g class="ldl-ani">
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.16935s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path
                                                    d="M42,39V9c0-1.657-1.343-3-3-3H9C7.343,6,6,7.343,6,9v30c0,1.657,1.343,3,3,3h30C40.657,42,42,40.657,42,39z"
                                                    fill="#1c9957" style="fill: rgb(28, 153, 87);"></path>
                                            </g>
                                        </g>
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.17742s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path d="M9,42h30c1.657,0-15-16-15-16S7.343,42,9,42z" fill="#3e7bf1"
                                                    style="fill: rgb(62, 123, 241);"></path>
                                            </g>
                                        </g>
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.18548s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path d="M42,39V9c0-1.657-16,15-16,15S42,40.657,42,39z" fill="#cbccc9"
                                                    style="fill: rgb(203, 204, 201);"></path>
                                            </g>
                                        </g>
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.19355s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path
                                                    d="M39,42c1.657,0,3-1.343,3-3v-0.245L26.245,23L23,26.245L38.755,42H39z"
                                                    fill="#efefef" style="fill: rgb(239, 239, 239);"></path>
                                            </g>
                                        </g>
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.20161s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path
                                                    d="M42,9c0-1.657-1.343-3-3-3h-0.245L6,38.755V39c0,1.657,1.343,3,3,3h0.245L42,9.245V9z"
                                                    fill="#ffd73d" style="fill: rgb(255, 215, 61);"></path>
                                            </g>
                                        </g>
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.20968s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path
                                                    d="M36,2c-5.523,0-10,4.477-10,10c0,6.813,7.666,9.295,9.333,19.851C35.44,32.531,35.448,33,36,33s0.56-0.469,0.667-1.149C38.334,21.295,46,18.813,46,12C46,6.477,41.523,2,36,2z"
                                                    fill="#d73f35" style="fill: rgb(215, 63, 53);"></path>
                                            </g>
                                        </g>
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.21774s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path d="M36 8.5A3.5 3.5 0 1 0 36 15.5A3.5 3.5 0 1 0 36 8.5Z"
                                                    fill="#752622" style="fill: rgb(117, 38, 34);"></path>
                                            </g>
                                        </g>
                                        <g class="ldl-layer">
                                            <g style="transform-origin: 24px 0px; transform: rotate(0deg); animation: 3.22581s linear -3.22581s infinite normal forwards running jingle-3d825006-3cda-4950-a58b-3018f9321a57;"
                                                class="ldl-ani">
                                                <path
                                                    d="M14.493,12.531v2.101h2.994c-0.392,1.274-1.455,2.185-2.994,2.185c-1.833,0-3.318-1.485-3.318-3.318s1.486-3.318,3.318-3.318c0.824,0,1.576,0.302,2.156,0.799l1.548-1.547C17.22,8.543,15.92,8,14.493,8c-3.038,0-5.501,2.463-5.501,5.5s2.463,5.5,5.501,5.5c4.81,0,5.637-4.317,5.184-6.461L14.493,12.531z"
                                                    fill="#fff" style="fill: rgb(255, 255, 255);"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            @if ($data['landing'] === 'cuidamos_de_ti')
                <div class="motivo_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="1900">

                    <select class="form-select @error('motivo') is-invalid @enderror" name="motivo" id="motivo">
                        <option value="" selected disabled>
                            Selecciona el motivo de la cita
                        </option>

                        <option value="examen_visual">
                            Examen visual / Eye test
                        </option>

                        <option value="gafas">
                            Gafas / Glasses
                        </option>

                        <option value="lentes_contacto">
                            Lentes de contacto / Contact lenses
                        </option>

                        <option value="audiologia">
                            Audiología / Hearing care
                        </option>

                        <option value="otra_consulta">
                            Otra consulta / Other
                        </option>
                    </select>

                </div>


                <div class="fecha_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                    data-aos-duration="1900">

                    <input class="form-control @error('fecha') is-invalid @enderror" type="date" name="fecha"
                        id="fecha">

                </div>

                <div class="hora_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                    data-aos-duration="2100">

                    <input class="form-control @error('hora') is-invalid @enderror" type="time" name="hora"
                        id="hora">

                </div>
            @endif

            <div class="nombre_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="500" data-aos-duration="1100">

                <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre"
                    id="nombre" placeholder='{{ __('form_translation.Nombre') }}'>

            </div>

            <div class="apellidos_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="500" data-aos-duration="1300">

                <input class="form-control @error('apellidos') is-invalid @enderror" type="text" name="apellidos"
                    id="apellidos" placeholder='{{ __('form_translation.Apellidos') }}'>

            </div>

            <div class="email_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1500">

                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                    id="email" placeholder='{{ __('form_translation.Email') }}'>

            </div>

            <div class="movil_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1700">

                <input class="form-control @error('movil') is-invalid @enderror" type="text" name="movil"
                    id="movil" placeholder='{{ __('form_translation.Telefono') }}'>

            </div>

            <div class="cont-botton-police">

                <div class="form-check form-check-reverse mt-5 p-0">
                    <input class="custom-checkbox" type="checkbox" value="1" name="check-poli"
                        id="reverseCheck1">

                    <label class="form-check-label" for="reverseCheck1">
                        <span>{{ __('form_translation.Aceptar_politicas_privacidad_1') }}</span>
                        <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" target="_blank"
                            style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                            {{ __('form_translation.Aceptar_politicas_privacidad_2') }}
                        </a>
                        <span> / I accept the</span>
                        <a href="{{ route('politicas.privacidad_en', app()->getLocale()) }}" target="_blank"
                            style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                             Privacy Policies
                        </a>
                    </label>
                </div>

                <div class="b-pedir-citas mt-5">
                    <button id="form" class="btn btn-color">{{ __('form_translation.Pedir_cita') }}</button>
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
                @if ($data['landing'] !== 'promo_progresivas')
                    <span class="">{{ __('form_translation.titol-gracias_2') }}</span>
                    <span class="mt-4">{{ __('form_translation.parrafo-1_2') }}</span>
                    <span class="mt-4">{{ __('form_translation.parrafo-2_2') }}</span>

                    <hr>
                @endif

                <span class="">{{ __('form_translation.titol-gracias') }}</span>
                <span class="mt-4">{{ __('form_translation.parrafo-1') }}</span>
                <span class="mt-4">{{ __('form_translation.parrafo-2') }}</span>

                <div class="b-volver mt-5">
                    <button class="btn btn-color" id="volver-form">{{ __('form_translation.volver') }}</button>
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
            url: '{{ route('validateForm') }}', // Ruta de Laravel que maneja la validación
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

        var weblogin = $('#_weblogin').val();
        var allStore = $('#_allStore').val();

        var tieneContexto = (weblogin && weblogin !== '') || (allStore && allStore !== '');

        // Limpiar los campos del formulario
        if (tieneContexto) {
            $('#formMacroContactologia').find('input[type=text], input[type=email]').val('');
        } else {
            $('#formMacroContactologia').find('input[type=text], input[type=email], select').val('');

            // Limpiar selects de ciudad y óptica
            $('#ciudad').html('<option value="">Selecciona una ciudad</option>');
            var opticaSelect = $('#optica');
            var opciones = opticaSelect.find('option');
            var webloginVacio = <?php echo empty($data['weblogin']) ? 'true' : 'false'; ?>;

            if (webloginVacio) {
                $('#optica').html('<option value="">Selecciona una óptica</option>');
            } else {

                if (opciones.length > 1) {
                    // Más de una opción → limpiar
                    opciones.first().prop('selected', true);
                    opticaSelect.removeClass('readonly-select').prop('disabled', false);
                } else if (opciones.length === 1) {
                    // Solo una opción → dejarla seleccionada
                    opciones.prop('selected', true);
                    opticaSelect.addClass('readonly-select').prop('disabled', true);
                }
            }

            // Quita la invalidación del select cuando es un solo campo
            $('#optica').removeClass('readonly-select');

            // Oculta el icono del mapa
            $('#animationdivIcon').addClass('d-none');
        }

        // Limpiar el checkbox
        $('#formMacroContactologia').find('input[type=checkbox]').prop('checked', false);

    })
</script>
