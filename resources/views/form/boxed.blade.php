
<div>

    <form id="formMacroContactologia" class="w-100 p-0" action="" method="POST">
    
        @csrf
        <input type="hidden" id="language" name="language" value="{{ $data['idioma'] }}">
        <input type="hidden" id="url_landing" name="url_landing" value="{{ $data['url'] }}">
        <input type="hidden" id="origen" name="origen" value="{{ $data['landing'] }}">
        <input type="hidden" id="_weblogin" name="_weblogin" value="{{ $data['weblogin'] }}">
        <input type="hidden" id="weblogin_json" name="weblogin_json" value="">
        <input type="hidden" id="_optica" name="_optica" value="{{ $data['optica'] }}">
    
    
    
        <p class="lead fs-5">{{ __('form_translation.Pide_cita_rellenando') }}</p>
    
    
        @if (!$data['weblogin'])
            <div class="provincias_div">
    
                <select class="form-select @error('provincias') is-invalid @enderror" name="provincias" id="provincias">
                    <option value="" selected>{{ __('form_translation.Selecciona_una_provincia') }}</option>
                    @foreach ($data['provincias'] as $provincia)
                        <option value="{{ $provincia->id }}">{{ $provincia->a1 }}</option>
                    @endforeach
                </select>
        @endif
    
    
        @if (!$data['optica'])
            <div class="ciudad_div mt-2">
    
                <select class="form-select @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad"></select>
    
    
            </div>
        @endif
    
    
        <div class="optica_div mt-2">
    
            <select class="form-select @error('optica') is-invalid @enderror" name="optica" id="optica">
                <option value=""></option>
            </select>
    
        </div>
    
    
    
        <div class="nombre_div mt-2">
    
            <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" id="nombre"
                placeholder='{{ __('form_translation.Nombre') }}'>
    
        </div>
    
        <div class="apellidos_div mt-2">
    
            <input class="form-control @error('apellidos') is-invalid @enderror" type="text" name="apellidos"
                id="apellidos" placeholder='{{ __('form_translation.Apellidos') }}'>
    
        </div>
    
        <div class="email_div mt-2">
    
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email"
                placeholder='{{ __('form_translation.Email') }}'>
    
        </div>
    
        <div class="movil_div mt-2">
    
            <input class="form-control @error('movil') is-invalid @enderror" type="text" name="movil" id="movil"
                placeholder='{{ __('form_translation.Telefono') }}'>
    
        </div>
    
        <div class="form-check form-check-reverse mt-5">
            <label class="form-check-label"
                for="reverseCheck1"><span>{{ __('form_translation.Aceptar_politicas_privacidad_1') }}</span><span
                    style="margin-left: 5px; text-decoration: underline; cursor: pointer;">{{ __('form_translation.Aceptar_politicas_privacidad_2') }}</span></label>
            <input class="form-check-input" type="checkbox" value="1" name="check-poli" id="reverseCheck1">
        </div>
    
    
    
    
    
        <div class="b-pedir-citas mt-5">
    
            <button type="submit" id="form" class="btn btn-success">{{ __('form_translation.Pedir_cita') }}</button>
    
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
    
    <div id="gracias" class="text-dark d-none">
    
        <div class="">
    
            <div class="d-flex flex-column text-center w-100">
    
                <span class="">{{ __('form_translation.titol-gracias') }}</span>
                <span class="">{{ __('form_translation.parrafo-1') }}</span>
                <span class="">{{ __('form_translation.parrafo-2') }}</span>
    
                <hr>
    
                <button class="btn btn-success" id="volver-form">{{ __('form_translation.volver') }}</button>
    
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
    $('#form').on('click', function(e) {
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
        $('#formMacroContactologia').removeClass('d-none');
        $('input').removeClass('border-1 border-bottom border-danger'); //remueve el style de los input

        // Limpiar los campos del formulario
        $('#formMacroContactologia').find('input[type=text], input[type=email], select').val('');
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
