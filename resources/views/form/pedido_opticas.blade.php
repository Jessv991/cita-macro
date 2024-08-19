<div class="contenedor-form w-100 h-75 d-flex justify-content-center align-items-center">

    <form id="formMacroContactologia" class="w-100 p-0 m-0" action="" method="POST">

        @csrf
        <input type="hidden" id="language" name="language" value="{{ $data['idioma'] }}">
        <input type="hidden" id="url_landing" name="url_landing" value="{{ $data['url'] }}">
        <input type="hidden" id="origen" name="origen" value="{{ $data['landing'] }}">
        <input type="hidden" id="_weblogin" name="_weblogin" value="{{ $data['weblogin'] }}">
        <input type="hidden" id="_optica" name="_optica" value="{{ $data['optica'] }}">
        <input type="hidden" id="_logo" name="_logo" value="{{ $data['logo'] }}">
        <input type="hidden" id="_test" name="_test" value="{{ $data['test'] }}">


        <div class="d-flex justify-content-center align-items-start mb-5">
            <p class="text-top-form">{{ __('form_translation.pedido_cliente_rellenando') }}</p>
        </div>


        <div>

            <div class="optica_div" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1000">

                <input class="form-control @error('optica') is-invalid @enderror" type="text" name="optica"
                    id="optica" placeholder='{{ __('form_translation.nombre_optica') }}'>
                    
            </div>

            <div class="codigo_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="2200">

                <input class="form-control @error('codigo') is-invalid @enderror" type="text" name="codigo"
                    id="codigo" placeholder='{{ __('form_translation.codigo') }}'>

            </div>
            
            <div class="nombre_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="2200">

                <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre"
                    id="nombre" placeholder='{{ __('form_translation.contacto') }}'>

            </div>

            <div class="email_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="3000">

                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                    id="email" placeholder='{{ __('form_translation.Email') }}'>

            </div>

            <div class="unidad_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="1400">

                <select class="form-select @error('unidad') is-invalid @enderror" name="unidad"id="unidad">
                    <option value="" disabled selected>{{ __('form_translation.kit') }}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

            </div>

            {{--  @php
                $locale = $data['idioma'] 
            @endphp --}}

            <div class="cont-botton-police" data-aos="zoom-in">

                <div class="form-check form-check-reverse mt-5 p-0">
                    <input class="custom-checkbox" type="checkbox" value="1" name="check-poli" id="reverseCheck1">

                    <label class="form-check-label" for="reverseCheck1">
                        <span>{{ __('form_translation.Aceptar_politicas_privacidad_1') }}</span>
                        <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" target="_blank"
                            style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                            {{ __('form_translation.Aceptar_politicas_privacidad_2') }}
                        </a>
                    </label>
                </div>

                <div class="b-pedir-citas mt-5">

                    <button type="submit" id="form"
                        class="btn btn-color">{{ __('form_translation.Pedir_kit') }}</button>

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

                <span class="">{{ __('form_translation.titol-gracias-pedido') }}</span>
                <span class="mt-4">{{ __('form_translation.parrafo-1-pedido') }}</span>
                <span class="mt-4">{{ __('form_translation.parrafo-2') }}</span>

                <hr>

                <div class="b-volver mt-5">
                    <button class="btn btn-color" id="volver-form">{{ __('form_translation.volver') }}</button>
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    $('#form').on('click', function(e) {
        e.preventDefault();
        var formData = $('#formMacroContactologia').serialize();

        $.ajax({
            url: '{{ route('validateFormKit') }}', // Ruta de Laravel que maneja la validación
            type: 'POST',
            data: formData + '&_token={{ csrf_token() }}', // Agrega el token CSRF
            success: function(response) {
                $('#formMacroContactologia').addClass('d-none');
                $('#gracias').removeClass('d-none');
                // Manejar la respuesta del servidor, por ejemplo, redirigir
                //console.log(response);
                //window.location.href = response.redirectTo; // Ejemplo de redirección
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
        var optica = $('#_optica').val();

        // Limpiar los campos del formulario
        if (optica && weblogin) {
            $('#formMacroContactologia').find('input[type=text], input[type=email]').val('');
        } else {
            $('#formMacroContactologia').find('input[type=text], input[type=email], select').val('');
            //quita la invalidación del select cuando es un sólo campo
            $('#optica').removeClass('readonly-select');

            //oculta el icono del mapa
            $('#animationdivIcon').addClass('d-none');
        }
        // Para los selects, también se puede usar:
        // $('#formMacroContactologia').find('select').prop('selectedIndex', 0);

        // Limpiar el checkbox
        $('#formMacroContactologia').find('input[type=checkbox]').prop('checked', false);

    })

    /* var locale = {!! json_encode($data) !!};
    $(document).ready(function() {
        localStorage.setItem('locale', JSON.stringify(locale));
    }); */
</script>