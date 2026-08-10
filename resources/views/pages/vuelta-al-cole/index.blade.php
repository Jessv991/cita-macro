@include('layouts.header')

<div class="background-container">
    @if ($data['tipo_dispositivo'] == 'mobile')
        <div class="background-item">
        @else
            <div class="background-item mb-5-wrapper">
    @endif
    @if ($data['tipo_dispositivo'] == 'mobile')
        <div class="banner-logo text-center">
            <img class="d-block mx-auto logo p-3"
                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/logo_natural.png') }}">
        </div>
    @else
        <div class="banner-logo d-flex justify-content-between align-items-center btn-wrapper-fixed">
            <div class="img-logo ms-5">
                <img class="logo"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/logo_natural.png') }}"
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
    <img class="d-block mx-auto w-100 h-75"
        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
    <?php
                }else{
            ?>
    <img class="d-block mx-auto w-100 h-100"
        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
    <?php
                }
            ?>
</div>
<div class="text-center">
    <?php
                if($data['tipo_dispositivo']!='mobile'){
            ?>
    <div class="row ps-5 pe-5 mt-5 mb-5">
        <div class="col-6">
            <img class="d-block mx-auto w-100 h-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/tu_vista.png') }}">
        </div>
        <div class="col-6 text-start pt-4">
            <span class="text-dark d-block mb-3 fs-4"
                style="margin-right: 25%;">{{ __('vuelta-al-cole.nuevos-horarios') }}</span>
            <img class="d-block w-75"
                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/empieza.png') }}">
        </div>
    </div>
    <?php
                }else{
            ?>
                <img class="d-block mx-auto w-100 h-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/tu_vista.png') }}">
                <span class="text-dark text-center d-block mb-3 fs-5 ps-5 pe-5">{{ __('vuelta-al-cole.nuevos-horarios') }}</span>
                <img class="d-block w-100 mb-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/empieza.png') }}">
                <?php
                }
            ?>
</div>
<div>
    <img class="d-block w-100"
        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner2.png') }}">
</div>
<div class="h-100">
    <div class="form-section">
        @include('form.pide_cita')
    </div>
</div>
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
