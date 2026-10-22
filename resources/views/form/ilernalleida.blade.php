<div>

    <div class="contenedor-form w-100 h-100 d-flex justify-content-center align-items-center">

        <form id="formMacroContactologia" class="w-100 p-0 m-0" action="" method="POST">

            @csrf
            <input type="hidden" id="language" name="language" value="{{ $data['idioma'] }}">
            <input type="hidden" id="url_landing" name="url_landing" value="{{ $data['url'] }}">
            <input type="hidden" id="origen" name="origen" value="{{ $data['origin'] }}">
            <input type="hidden" id="_weblogin" name="_weblogin" value="{{ $data['weblogin'] }}">
            <input type="hidden" id="_optica" name="_optica" value="{{ $data['optica'] }}">
            <input type="hidden" id="_opticaAndWeblogin" name="_opticaAndWeblogin" value="">
            <input type="hidden" id="_logo" name="_logo" value="{{ $data['logo'] }}">
            <input type="hidden" id="_ip" name="_ip" value="{{ $data['ip'] }}">
            <input type="hidden" id="_test" name="_test" value="{{ $data['test'] }}">
            <input type="hidden" id="promocional" name="promocional" value="{{ $data['promocional'] }}">
            <input type="hidden" id="landing" name="landing" value="{{ $data['landing'] }}">
            <input type="hidden" id="tipo_dispositivo" name="tipo_dispositivo"
                value="{{ $data['tipo_dispositivo'] }}">
            <input type="hidden" id="dispositivo" name="dispositivo" value="{{ $data['dispositivo'] }}">
            <input type="hidden" id="premio_obtenido" name="premio_obtenido" value="">


            <div class="d-flex flex-column align-items-center">
                <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/enhorabuena.png') }}">
                <img id="img_premio" class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/no_premio.png') }}">
            </div>


            <div>

                <div class="nombre_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="500">

                    <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre"
                        id="nombre" placeholder='{{ __('form_translation.Nombre') }}' readonly>
                </div>

                <div class="apellidos_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="500">

                    <input class="form-control @error('apellidos') is-invalid @enderror" type="text" name="apellidos"
                        id="apellidos" placeholder='{{ __('form_translation.Apellidos') }}' readonly>
                </div>

                <div class="email_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                    data-aos-duration="700">

                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                        id="email" placeholder='{{ __('form_translation.Email_practicas') }}' readonly>
                </div>

                <div class="movil_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="700">

                    <input class="form-control @error('movil') is-invalid @enderror" type="text" name="movil"
                        id="movil" placeholder='{{ __('form_translation.Telefono_practicas') }}'>
                </div>

                <div class="cont-botton-police">

                    <div class="form-check form-check-reverse mt-2 p-0">
                        <input class="custom-checkbox" type="checkbox" value="1" name="check-poli"
                            id="reverseCheck1">

                        <label class="form-check-label" for="reverseCheck1">
                            <span>{{ __('form_translation.Aceptar_politicas_privacidad_1') }}</span>
                            <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" target="_blank"
                                style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                                {{ __('form_translation.Aceptar_politicas_privacidad_2') }}
                            </a>
                        </label>
                    </div>

                    <div class="form-check form-check-reverse p-0">
                        <input class="custom-checkbox" type="checkbox" value="1" name="check-gestion"
                            id="reverseCheck2">

                        <label class="form-check-label" for="reverseCheck2">
                            <span>{{ __('form_translation.Aceptar_gestion_natural') }}</span>
                            <a href="{{ route('politicas.gestion', app()->getLocale()) }}" target="_blank"
                                style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                                {{ __('form_translation.Aceptar_gestion_natural2') }}
                            </a>
                            <span>&nbsp;{{ __('form_translation.Aceptar_gestion_natural3') }}</span>
                        </label>
                    </div>

                    <div class="b-pedir-citas mt-3 d-flex flex-column align-items-center">
                        <button id="form" class="btn btn-color mb-3">ACCEPTAR ➜</button>
                        <p class="fst-italic text-b fw-semibold">Visita el teu centre Natural Optics más proper i
                            gaudeix del teu premi!</p>

                        <div>
                            <div class="row p-2">
                                <div class="col-4 p-1 font-t"><img class="w-100"
                                        src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/lleida_concept.svg') }}"><br>Prat
                                    de la Riba, 25<br>Tel. 973 222 435<br>Mbl. 689 219 917</div>
                                <div class="col-4 p-1 font-t"><img class="w-100"
                                        src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/next.svg') }}"><br>Rovira
                                    Roure, 5<br>Tel. 973 300 760<br>Mbl. 616 889 052</div>
                                <div class="col-4 p-1 font-t"><img class="w-100"
                                        src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/bordeta.svg') }}"><br>Av.
                                    de Flix, 22<br>Tel. 973 212 260<br>Mbl. 678 076 998</div>
                            </div>

                            <div class="row p-2">
                                <div class="col-4 p-1 font-t"><img class="w-100"
                                        src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/mollerussa.svg') }}"><br>Ciutat
                                    de Lleida, 2<br>Tel. 973 710 369<br>Mbl. 609 718 076</div>
                                <div class="col-4 p-1 font-t"><img class="w-100"
                                        src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/tarrega.svg') }}"><br>C/Sant
                                    Pelegrí, 29<br>Tel. 973 501 558<br>Mbl. 640 542 656</div>
                                <div class="col-4 p-1 font-t"><img class="w-100"
                                        src="{{ asset($data['rutaAsset'] . 'assets/img/ilernalleida/baaguer.svg') }}"><br>Pg.
                                    de l'Estació, 11<br>Tel. 973 443 691<br>Mbl. 608 412 585</div>
                            </div>
                        </div>
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

                    <span class="">{{ __('form_translation.titol-practicas') }}</span>
                    <span class="mt-4">{{ __('form_translation.parrafo-practica') }}</span>
                    <span class="mt-4">{{ __('form_translation.parrafo-2') }}</span>

                    <hr>

                    <div class="b-volver mt-5">
                        <button class="btn btn-color" id="volver-form">{{ __('form_translation.volver') }}</button>
                    </div>

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
            url: '{{ route('ValidateRuleta') }}', // Ruta de Laravel que maneja la validación
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

        const modalElement = document.getElementById('landingModal');
        const modalElement2 = document.getElementById('landingModal2');

        if (window.bootstrap) {
            // 1. Cerrar el segundo modal (landingModal2)
            if (modalElement2) {
                const modalInstance2 = bootstrap.Modal.getInstance(modalElement2);
                if (modalInstance2) {
                    modalInstance2.hide();
                }
            }

            // 2. Abrir el primer modal (landingModal)
            if (modalElement) {
                const modalInstance1 = bootstrap.Modal.getOrCreateInstance(modalElement);
                modalInstance1.show();
            }
        }

        const nombre = document.getElementById('nombre1');
        const apellidos = document.getElementById('apellidos1');
        const email = document.getElementById('email1');
        const movil = document.getElementById('movil');

        nombre.value = '';

        apellidos.value = '';

        email.value = '';

        movil.value = '';

        $('#gracias').addClass('d-none');
        $('#formMacroContactologia .error').remove(); //remuevo los msjs de error que hayan quedado
        $('input').removeClass('border-1 border-bottom border-danger'); //remueve el style de los input

        $('#formMacroContactologia').removeClass('d-none');

        $('#formMacroContactologia').find('input[type=checkbox]').prop('checked', false);

        form.classList.remove('d-none');
        divAgain.classList.add('d-none');

    })
</script>
