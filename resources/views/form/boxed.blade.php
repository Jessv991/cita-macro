<form id="formMacroContactologia" class="w-100 p-0" action="" method="POST">

    @dump($errors)
    <div class="input-box">

        <p class="lead fs-5">{{ __('form_translation.Pide_cita_rellenando') }}</p>

        <div class="provincias_div">

            <select class="form-select @error('provincia') is-invalid @enderror" name="provincias" id="provincias">

                <option value="" selected>{{ __('form_translation.Selecciona_una_provincia') }}</option>

                @foreach ($data['provincias'] as $provincia)
                    <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                @endforeach

            </select>

        </div>

        <div class="ciudad_div mt-2">

            <select class="form-select @error('ciudad') is-invalid @enderror" name="ciudad" id="ciudad">

            </select>

        </div>

        <div class="optica_div mt-2">

            <select class="form-select @error('optica') is-invalid @enderror" name="optica" id="optica">
                <option value=""></option>
            </select>

        </div>

        <div class="nombre_div mt-2">

            <input class="form-control @error('nombre') is-invalid @enderror" type="text"
                placeholder='{{ __('form_translation.Nombre') }}'>

        </div>

        <div class="apellidos_div mt-2">

            <input class="form-control @error('apellido') is-invalid @enderror" type="text"
                placeholder='{{ __('form_translation.Apellidos') }}'>

        </div>

        <div class="email_div mt-2">

            <input class="form-control @error('email') is-invalid @enderror" type="text"
                placeholder='{{ __('form_translation.Email') }}'>

        </div>

        <div class="movil_div mt-2">

            <input class="form-control @error('movil') is-invalid @enderror" type="text"
                placeholder='{{ __('form_translation.Telefono') }}'>

        </div>

        <div class="form-check form-check-reverse mt-5">
            <label class="form-check-label"
                for="reverseCheck1"><span>{{ __('form_translation.Aceptar_politicas_privacidad_1') }}</span><span
                    style="margin-left: 5px; text-decoration: underline; cursor: pointer;">{{ __('form_translation.Aceptar_politicas_privacidad_2') }}</span></label>
            <input class="form-check-input" type="checkbox" value="" id="reverseCheck1">
        </div>



        <!-- Tu formulario aquí -->

        <div class="b-pedir-citas mt-5">

            <button type="submit" id="form"
                class="btn btn-success">{{ __('form_translation.Pedir_cita') }}</button>

        </div>

    </div>

    <script>
        $('#form').on('click', function(e) {
            e.preventDefault();
            var formData = $('#formMacroContactologia').serialize();

            $.ajax({
                url: '{{ route('validateForm') }}', // Ruta de Laravel que maneja la validación
                type: 'POST',
                data: formData + '&_token={{ csrf_token() }}', // Agrega el token CSRF
                success: function(response) {
                    // Manejar la respuesta del servidor, por ejemplo, redirigir
                    window.location.href = response.redirectTo; // Ejemplo de redirección
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    console.error(error);
                }
            });
        });
    </script>

</form>
