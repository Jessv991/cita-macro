@include('layouts.header')

<div class="background-container">
    <div class="background-item">

        <div class="boton-flotante d-flex justify-content-end">

            <div class="w-100 d-flex flex-row">
                <div class="w-50 d-flex justify-content-start">
                    <img class="logo"
                        src="{{ asset($data['rutaAsset'] . 'assets\logos\basicos\logo-audio-violet.png') }}"
                        alt="Logo">
                </div>
                <div class="w-50 d-flex justify-content-end">
                    <a href="#contAllForm" id="diret-form"
                        class="btn btn-color2">{{ __('form_translation.Pedir_cita') }}</a>
                </div>
            </div>

        </div>

        <div class="w-100">
            <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/actualiza/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.gif') }}">
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center mt-5">
            <div class="w-75 p-1 p-lg-5 primeros-parrafos">
                <p>{{ __('actualiza.sub-1') }} <span class="fw-bold">{{ __('actualiza.sub-2') }}</span>
                    {{ __('actualiza.sub-3') }} <span class="fw-bold">{{ __('actualiza.sub-4') }}</span></p>
            </div>
            <img class="titulo_tu_vista"
                src="{{ asset($data['rutaAsset'] . 'assets/img/actualiza/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo-tecnologia.png') }}">
        </div class="w-100">
        <div class="row d-flex justify-content-center mt-5 mb-5">
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-end">
                <img class="w-75"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/actualiza/desktop/' . $data['idioma'] . '/conexion.png') }}">
            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-center">
                <img class="w-75"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/actualiza/desktop/' . $data['idioma'] . '/libertad.png') }}">
            </div>
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                <img class="w-75"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/actualiza/desktop/' . $data['idioma'] . '/recargable.png') }}">
            </div>
        </div>
        <div>
        </div>

        <div class="w-100">
            <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/actualiza/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/beneficios.png') }}">
        </div>

        <div class="w-100  d-flex align-items-center justify-content-center mt-5 contenedor_form">
            @include('form.pide_cita')
        </div>

        <footer class="row w-100">
            <?php
                if($data['tipo_dispositivo']!='mobile') {            
            ?>
            <div class="d-flex footer-contact text-center col-12">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                    class="p-privacity col-4 fw-bold">{{ __('contactologia.Politicas-privacidad') }}</a>
                <img class="d-block mx-auto logo-N col-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N_Violet.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                    class="p-cookies col-4 fw-bold">{{ __('contactologia.Politicas-cookies') }}</a>
            </div>
            <?php
                }else{               
            ?>
            <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
                <img class="d-block mx-auto logo-N mt-5"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N_Violet.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2 fw-bold">
                    {{ __('contactologia.Politicas-privacidad') }}
                </a>
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1 fw-bold">
                    {{ __('contactologia.Politicas-cookies') }}
                </a>
            </div>
            <?php
                }
            ?>
        </footer>

    </div>
</div>

@include('layouts.footer')
