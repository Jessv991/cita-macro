@include('layouts.header')
@if ($data['tipo_dispositivo'] == 'desktop')
    <div class="btn-wrapper-fixed">
        <button id="btn-flotante" class="btn btn-color-cita"
            onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
            {{ __('form_translation.Pedir_cita') }}
        </button>
    </div>
@else
    <div class="fixed-bottom-container justify-content-center align-items-center"
        onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
        <button class="btn-bottom-center">{{ __('form_translation.Pedir_cita') }}</button>
    </div>
@endif
<div>
    <img class="d-block mx-auto w-100 h-100"
        src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/50/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/header.png') }}">
</div>
<div class="text-header">
    <p>{{ __('form_translation.parrafo-vision') }}</p>
    <p class="text-vision">{{ __('form_translation.parrafo2-vision') }}</p>
</div>
@if ($data['tipo_dispositivo'] == 'desktop')
    <div class="d-flex justify-content-center align-items-center">
        <img class="img-circle"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/50/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img.png') }}">
    </div>
@else
    <div>
        <img class="img-circle"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/50/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/text.png') }}">
    </div>
    <div>
        <img class="img-circle"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/50/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/enfermedades.png') }}">
    </div>
@endif
<div class="text-protect">
    <p class="space-text">{{ __('form_translation.parrafo-salud') }}</p>
</div>
<div class="text-protect2">
    <p class="space-text">{{ __('form_translation.parrafo-chequeo') }}</p>
</div>
<div class="h-100 form-space">
    <div class="form-cita">
        @include('form.pide_cita')
    </div>
</div>
@include('layouts.footer')
