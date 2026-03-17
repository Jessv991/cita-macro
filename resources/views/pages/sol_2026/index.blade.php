@include('layouts.header')
<div class="background-container">
    <div class="background-item d-flex flex-column align-items-center">

        <div class="boton-flotante d-flex justify-content-end">

            <div class="w-100 d-flex flex-row">
                <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start align-items-center">
                    <img class="logo" src="{{ asset($data['rutaAsset'] . 'assets/logos/basicos/logo.png') }}"
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
                src="{{ asset($data['rutaAsset'] . 'assets/img/sol_2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center prim-text">
            <div class="w-100 d-flex justify-content-center">
                <img class="titulo_tu_vista2"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol_2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/texto1.png') }}">
            </div>
            <div class="w-75 p-1 primeros-parrafos1 text-width">
                <p>{{ __('sol_2026.parrafo-1') }}<span class="fw-bold">{{ __('sol_2026.parrafo-1.1') }}</span>{{ __('sol_2026.parrafo-1.2') }}</p>
            </div>
        </div>


        <div class="w-100 d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol_2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/gafas.png') }}">
            </div>
        </div>

        <div  id="startForm" class="w-100  d-flex align-items-center justify-content-center mt-lg-5 contenedor_form">
            @include('form.pide_cita')
        </div>

        <footer class="row w-100 p-0">
            <?php
                if($data['tipo_dispositivo']!='mobile') {            
            ?>
            <div class="d-flex footer-contact text-center col-12">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                    class="p-privacity col-4 fw-bold">{{ __('sol_2026.Politicas-privacidad') }}</a>
                <img class="d-block mx-auto logo-N col-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                    class="p-cookies col-4 fw-bold">{{ __('sol_2026.Politicas-cookies') }}</a>
            </div>
            <?php
                }else{               
            ?>
            <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
                <img class="d-block mx-auto logo-N mt-5"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2 fw-bold">
                    {{ __('sol_2026.Politicas-privacidad') }}
                </a>
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1 fw-bold">
                    {{ __('sol_2026.Politicas-cookies') }}
                </a>
            </div>
            <?php
                }
            ?>
        </footer>

    </div>
</div>

@include('layouts.footer')

