<form id="formMacroContactologia" class="w-100 p-0" action="" method="POST">

    <div class="input-box">

        <p class="lead fs-5">{{ __('form_translation.Pide_cita_rellenando') }}</p>

        <div class="provincias_div">

            <select class="form-select" name="provincias" id="provincias">

                <option value="" selected>{{ __('form_translation.Selecciona_una_provincia') }}</option>

                @foreach ($data['provincias'] as $provincia)
                    <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                @endforeach

            </select>

        </div>

        <div class="ciudad_div mt-2">

            <select class="form-select" name="ciudad" id="ciudad">

            </select>

        </div>

        <div class="optica_div mt-2">

            <select class="form-select" name="optica" id="optica">
                <option value=""></option>
            </select>

        </div>

        <div class="nombre_div mt-2">

            <input class="form-control" type="text" placeholder='{{ __('form_translation.Nombre') }}'>

        </div>

        <div class="apellidos_div mt-2">

            <input class="form-control" type="text" placeholder='{{ __('form_translation.Apellidos') }}'>

        </div>

        <div class="email_div mt-2">

            <input class="form-control" type="text" placeholder='{{ __('form_translation.Email') }}'>

        </div>

        <div class="movil_div mt-2">

            <input class="form-control" type="text" placeholder='{{ __('form_translation.Telefono') }}'>

        </div>

        <div class="form-check form-check-reverse mt-5">
            <label class="form-check-label"
                for="reverseCheck1"><span>{{ __('form_translation.Aceptar_politicas_privacidad_1') }}</span><span
                    style="margin-left: 5px; text-decoration: underline; cursor: pointer;">{{ __('form_translation.Aceptar_politicas_privacidad_2') }}</span></label>
            <input class="form-check-input" type="checkbox" value="" id="reverseCheck1">
        </div>

        <div class="b-pedir-citas mt-5">
            <button type="button" class="btn btn-success">{{ __('form_translation.Pedir_cita') }}</button>
        </div>

    </div>

    <script>
        $('#provincias').on('change', function() {
            var provinciaId = $(this).val();
            if (provinciaId) {
                $.ajax({
                    url: '{{ route('getLocalidadByProvincia') }}',
                    type: 'POST',
                    data: {
                        provincias: provinciaId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#ciudad').empty();
                        // Agregar opción por defecto
                        $('#ciudad').append(
                            '<option value="">{{ __('form_translation.Selecciona_una_ciudad') }}</option>'
                        );
                        // Agregar opciones de ciudades obtenidas del servidor
                        $.each(data, function(key, value) {
                            $('#ciudad').append('<option value="' + value.d3 + '">' + value.d3 +
                                '</option>');
                        });
                    }
                });
            } else {
                // Si no se selecciona ninguna provincia, vaciar el select de ciudades
                $('#ciudad').empty();
                // Agregar opción por defecto
                $('#ciudad').append(
                    '<option value="">{{ __('form_translation.Selecciona_una_ciudad') }}</option>');
            }
        });

        // Para agregar la opción por defecto cuando se carga la página por primera vez
        $(document).ready(function() {
            $('#ciudad').append('<option value="">{{ __('form_translation.Selecciona_una_ciudad') }}</option>');
        });


        $('#ciudad').on('change', function() {
            var ciudadId = $(this).val();
            if (ciudadId) {
                $.ajax({
                    url: '{{ route('getOpticasByProvincia') }}',
                    type: 'POST',
                    data: {
                        ciudad: ciudadId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        if (data.length == 1) {
                            $('#optica').empty();
                            // Agregar opciones de ciudades obtenidas del servidor
                            $.each(data, function(key, value) {
                                $('#optica').append('<option value="' + value.codigo + '">' +
                                    value.d29 + ' - ' + value.d23 + '</option>');
                            });

                        } else {

                            $('#optica').empty();

                            // Agregar opción por defecto
                            $('#optica').append(
                                '<option value="">{{ __('form_translation.Selecciona_una_optica') }}</option>'
                                );
                            // Agregar opciones de ciudades obtenidas del servidor
                            $.each(data, function(key, value) {
                                $('#optica').append('<option value="' + value.codigo + '">' +
                                    value.d29 + ' - ' + value.d23 + '</option>');
                            });

                        }
                    }
                });
            }
        });
    </script>

</form>
