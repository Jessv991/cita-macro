@include('layouts.header')
@if ($data['tipo_dispositivo'] == 'desktop')
    <div class="btn-wrapper-fixed">
        <button id="btn-flotante" class="btn btn-color-cita"
            onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
            {{ __('form_translation.Pedir_cita') }}
        </button>
    </div>
    @else
        <div class="fixed-bottom-container justify-content-center align-items-center" onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
            <button class="btn-bottom-center">{{ __('form_translation.Pedir_cita') }}</button>
        </div>
@endif
<div>
    <img class="d-block mx-auto w-100 h-100"
        src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/18/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/header.png') }}">
</div>
<div class="text-header">
    <p>{{ __('form_translation.parrafo-piel') }}</p>
</div>
<div class="d-flex justify-content-center align-items-center gap-img">
    <img class="img-circle"
        src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/18/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img.png') }}">
    <img class="img-circle"
        src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/18/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}">
    <img class="img-circle"
        src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/18/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img3.png') }}">
</div>
<div class="text-header">
    <p class="solution-text">{{ __('form_translation.soluciones') }}</p>
</div>
<div class="d-flex align-items-center">
    <div class="flex-grow-1 text-center">
        <img class="w-50 h-50"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/18/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img4.png') }}">
    </div>
    <div class="flex-shrink-0 mx-2">
        <img class="img-linea"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/18/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/linea.png') }}">
    </div>
    <div class="flex-grow-1 text-center">
        <img class="w-50 h-50"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/18/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img5.png') }}">
    </div>
</div>
<div class="text-protect">
    <p class="space-text">{{ __('form_translation.proteger') }}</p>
</div>
<div class="h-100 form-space">
    <div class="form-cita">
        @include('form.pide_cita')
    </div>
</div>
@include('layouts.footer')
