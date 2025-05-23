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
        src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/header.png') }}">
</div>
<div class="text-header">
    <p>{{ __('form_translation.parrafo-aprendiz') }}</p>
</div>
@if ($data['tipo_dispositivo'] == 'desktop')
    <div class="d-flex justify-content-center align-items-center">
        <img class="img-alertas"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/alertas.png') }}">
    </div>
    <div class="text-header">
        <p class="text-revision">{{ __('form_translation.parrafo-revision') }}</p>
    </div>
@else
    <div class="d-flex justify-content-center align-items-center">
        <img class="img-alertas"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/alertas.png') }}">
    </div>
    <div class="text-header">
        <p class="text-revision">{{ __('form_translation.parrafo-revision') }}</p>
    </div>
@endif
<div class="container-imgs">
    <div class="d-flex justify-content-center align-items-center gap-img">
        <img class="img-circle"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img.png') }}">
        <img class="img-circle"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}">
        <img class="img-circle"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img3.png') }}">
    </div>

    <div class="d-flex justify-content-center align-items-center gap-img">
        <img class="img-circle"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img4.png') }}">
        <img class="img-circle2"
            src="{{ asset($data['rutaAsset'] . 'assets/img/cita-commodity/0-17/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img5.png') }}">
    </div>
</div>
<div class="h-100 form-space">
    <div class="form-cita">
        @include('form.pide_cita')
    </div>
</div>
@include('layouts.footer')
