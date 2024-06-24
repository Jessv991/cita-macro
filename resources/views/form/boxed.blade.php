<div class="input-box">
    <p class="lead fs-5">{{ __('form_translation.Pide_cita_rellenando') }}</p>

    <div class="provinciasDiv">

        <select class="form-select" name="provincias" id="provincias">

            <option value="" selected>{{ __('form_translation.Selecciona_una_provincia') }}</option>

            @foreach ($data['provincias'] as $provincia)
                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
            @endforeach

        </select>

        <select class="form-select" name="localidad" id="localidad">
            @foreach ($data['centros'] as $centro)
                <option value=""></option>
            @endforeach
        </select>

    </div>



</div>
