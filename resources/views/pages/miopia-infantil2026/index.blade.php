@include('layouts.header')

<div class="background-container">
    @if ($data['tipo_dispositivo'] == 'mobile')
        <div class="background-item">
        @else
            <div class="background-item mb-5-wrapper">
    @endif
    @if ($data['tipo_dispositivo'] == 'mobile')
        <div class="banner-logo-mobile text-center">
            <img class="d-block mx-auto logo p-3"
                src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/logo_natural.png') }}">
        </div>
    @else
        <div class="banner-logo d-flex justify-content-between align-items-center btn-wrapper-fixed">
            <div class="img-logo ms-5">
                <img class="logo"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/logo_natural.png') }}"
                    alt="Logo">
            </div>
            <div class="btn-position">
                <button id="btn-flotante" class="btn btn-color-cita">{{ __('form_translation.Pedir_cita') }}</button>
            </div>
        </div>
    @endif
</div>
<div class="banner-pide-cita">
    <?php
                if($data['tipo_dispositivo']!='mobile'){
            ?>
    <img class="d-block mx-auto w-90 h-75"
        src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
    <?php
                }else{
            ?>
    <img class="d-block mx-auto w-100 h-100"
        src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
    <?php
                }
            ?>
</div>
@if ($data['tipo_dispositivo'] == 'mobile')
    <div class="text-center">
        <img class="d-block mx-auto w-100 h-auto p-4"
            src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img1.png') }}">
        <p class="ps-4 pe-4">{!! __('miopia-infantil2026.revision-visual-mobil') !!}</p>
        <img class="d-block mx-auto w-100 h-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}">

    </div>
@else
    <div class="container mt-4">
        <div class="row">
            <div class="col-6 d-flex flex-column mt-5">
                <img class="d-block mx-auto w-100 h-auto"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img1.png') }}">
                <p class="fs-5">{!! __('miopia-infantil2026.revision-visual') !!}</p>
            </div>

            <div class="col-6 d-flex">
                <img class="d-block mx-auto w-100 h-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}">
            </div>
        </div>
    </div>
@endif
<div>
    <img class="d-block mx-auto w-100 h-auto"
        src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img3.png') }}">
</div>
@if ($data['tipo_dispositivo'] == 'mobile')
    <div class="text-center mt-3">
        <img class="d-block mx-auto w-100 h-auto" alt="visión"
            src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img4.png') }}">
        <p class="ps-3 pe-3">{!! __('miopia-infantil2026.revision-visual2') !!}</p>
    </div>
@else
    <div class="row mt-5">
        <div class="col-6 d-flex flex-column">
            <img class="d-block mx-auto w-75 h-auto" alt="visión"
                src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img4.png') }}">
        </div>
        <div class="col-6 d-flex">
            <p class="fs-5 m-right">{!! __('miopia-infantil2026.revision-visual2') !!}</p>
        </div>
    </div>
@endif
@if ($data['tipo_dispositivo'] == 'mobile')
    <div>
    @else
        <div class="mt-5">
@endif
<img class="d-block mx-auto w-100 h-auto"
    src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img5.png') }}">
</div>
<div class="h-100">
    <div class="form-section">
        @include('form.pide_cita')
    </div>
</div>
@if ($data['tipo_dispositivo'] == 'mobile')
    <div class="text-center mt-3">
        <img class="d-block mx-auto w-100 h-auto"
            src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img6.png') }}">
    </div>
@else
    <div class="text-center mt-5">
        <img class="d-block mx-auto w-75 h-auto"
            src="{{ asset($data['rutaAsset'] . 'assets/img/miopia-infantil2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img6.png') }}">
    </div>
@endif
<?php
        if($data['tipo_dispositivo']=='mobile') {
    ?>
<div class="fixed-bottom-container justify-content-center align-items-center"
    onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
    <button class="btn-bottom-center">{{ __('form_translation.Pedir_cita') }}</button>
</div>
<?php
        }
    ?>

<footer class="w-100">
    <?php
            if($data['tipo_dispositivo']!='mobile') {            
        ?>
    <div class="d-flex footer-contact text-center col-12">
        <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
            class="p-privacity col-4">{{ __('contactologia.Politicas-privacidad') }}</a>
        <img class="d-block mx-auto logo-N col-4"
            src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
        <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
            class="p-cookies col-4">{{ __('contactologia.Politicas-cookies') }}</a>
    </div>
    <?php
            }else{               
        ?>
    <div class="d-flex flex-column align-items-center footer-contact text-center m-footer">
        <img class="d-block mx-auto logo-N mt-5"
            src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
        <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2">
            {{ __('contactologia.Politicas-privacidad') }}
        </a>
        <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1">
            {{ __('contactologia.Politicas-cookies') }}
        </a>
    </div>
    <?php
            }
        ?>
</footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function scrollToForm() {
        const form = document.getElementById("formMacroContactologia");
        form.scrollIntoView({
            behavior: "smooth"
        });
    }

    $('#btn-flotante').on('click', function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('#formMacroContactologia').offset().top
        }, 300);
    });
</script>
@include('layouts.footer')
