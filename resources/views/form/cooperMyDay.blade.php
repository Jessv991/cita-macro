<div class="contenedor-form w-100 h-100 d-flex justify-content-center align-items-center">

    <form id="formMacroContactologia" class="w-100 p-0 m-0" action="" method="POST">

        @csrf

        @if (isset($data['customText']) && $data['customText'] === 'true')
            <div class="d-flex justify-content-center align-items-start mb-5 text-center">
                <p class="text-top-form">{{ __('form_translation.' . $data['landing'] . '_' . $data['weblogin']) }}</p>
            </div>
        @else
            <div class="d-flex justify-content-center align-items-start mb-5">
                <p class="text-top-form">{{ __('form_translation.Pide_cita_rellenando') }}</p>
            </div>
        @endif


        <div>
            <div class="provincias_div" data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                data-aos-duration="500">

                <div class="row">
                    <div class="col-4 col-md-3 align-self-end">
                        <select class="form-select @error('group') is-invalid @enderror" name="group"
                            id="group">
                            <option value="" selected>{{ __('form_translation.group') }}</option>
                            <option value="nsl">NSL</option>
                            <option value="red">UGO</option>
                        </select>
                    </div>
                    <div class="col-8 col-md-9">
                        <select class="form-select @error('weblogin') is-invalid @enderror" name="weblogin"
                            id="weblogin">
                            <option value="" selected>{{ __('form_translation.weblogin') }}
                            </option>
                            @foreach ($data['provincias'] as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->a1 }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>


            <div class="optica_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="500" data-aos-duration="1100">
                <div class="row">
                    <div class="col-7 align-self-end">
                        <p class="m-0 text-white">Optica equis</p>
                    </div>
                    <div class="col-5">
                        <input class="form-control @error('code_optica') is-invalid @enderror" type="text" name="code_optica"
                            id="code_optica" placeholder='{{ __('form_translation.code') }}'>
                    </div>
                </div>

            </div>


            <div class="cont-botton-police">

                <div class="b-pedir-citas mt-5">
                    <button id="form" class="btn btn-color">{{ __('form_translation.Pedir_practicas') }}</button>
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

                <span class="">{{ __('form_translation.titol-gracias2') }}</span>
                <span class="mt-4">{{ __('form_translation.parrafo-1-cooper') }}</span>
                <span class="mt-4">{{ __('form_translation.parrafo-2-cooper') }}</span>

                <hr>

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
            url: '{{ route('validateFormCooper') }}', // Ruta de Laravel que maneja la validación
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
