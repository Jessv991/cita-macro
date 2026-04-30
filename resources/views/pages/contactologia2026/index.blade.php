@include('layouts.header')
<div class="background-container">
    <div class="background-item d-flex flex-column align-items-center">

        <div class="boton-flotante d-flex justify-content-end">

            <div class="w-100 d-flex flex-row">
                <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start align-items-center">
                    <img class="logo"
                        src="{{ asset($data['rutaAsset'] . 'assets/logos/basicos/Natural_Optics_Mail.png') }}"
                        alt="Logo">
                </div>
                <div class="col-12 col-lg-6 d-none d-md-flex d-flex justify-content-end align-items-center">
                    <a href="#startForm" id="diret-form"
                        class="btn btn-color2">{{ __('form_translation.Pedir_cita') }}</a>
                </div>
            </div>

        </div>

        <div class="boton-flotante2 d-flex justify-content-end d-lg-none">

            <div class="w-100 d-flex flex-row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a href="#startForm" id="diret-form"
                        class="btn btn-color2">{{ __('form_translation.Pedir_cita') }}</a>
                </div>
            </div>

        </div>

        <div class="w-100 m-banner">
            <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/gif_banner.gif') }}">
        </div>

        @if ($data['sorteo'] === 'true')
            <div class="w-100 m-banner">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
            </div>
        @endif

        <div class="w-100 d-flex justify-content-center align-items-center text-center">
            <div class="w-75 primeros-parrafos1 text-width d-flex justify-content-center align-items-center">
                <p class="mt-5 mb-5">{{ __('contactologia2026.parrafo-1') }}<span
                        class="fw-bold fst-italic">{{ __('contactologia2026.parrafo-1.1') }}</span>{{ __('contactologia2026.parrafo-1.2') }}
                </p>
            </div>
        </div>


        <div class="w-100 d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img1.png') }}">
            </div>
        </div>

        <div class="w-100 d-flex justify-content-center mb-5">
            <img class="titulo_tu_vista2"
                src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titol1.png') }}">
        </div>

        <div class="w-100 d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}">
            </div>
        </div>

        <div class="w-100 d-flex justify-content-center mt-5 mb-5">
            <img class="titulo_tu_vista2"
                src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titol2.png') }}">
        </div>


        <div class="w-100 d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img3.png') }}">
            </div>
        </div>

        <div id="startForm" class="w-100  d-flex align-items-center justify-content-center mt-lg-5 contenedor_form">
            @include('form.pide_cita')
        </div>

        <footer class="row w-100 p-0 footer_class">
            <?php
                if($data['tipo_dispositivo']!='mobile') {            
            ?>
            <div class="d-flex footer-contact text-center col-12">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                    class="p-privacity col-4 fw-bold">{{ __('contactologia2026.Politicas-privacidad') }}</a>
                <img class="d-block mx-auto logo-N col-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                    class="p-cookies col-4 fw-bold">{{ __('contactologia2026.Politicas-cookies') }}</a>
            </div>
            <?php
                }else{               
            ?>
            <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
                <img class="d-block mx-auto logo-N mt-5"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2 fw-bold">
                    {{ __('contactologia2026.Politicas-privacidad') }}
                </a>
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1 fw-bold">
                    {{ __('contactologia2026.Politicas-cookies') }}
                </a>
            </div>
            <?php
                }
            ?>
        </footer>

    </div>
</div>

@include('layouts.footer')
