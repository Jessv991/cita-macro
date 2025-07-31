@include('layouts.header')

<div class="background-container">
    <div class="background-item">

        <div class="w-100">
            <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.gif') }}">
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center mt-5">
            <h1 class="titol-hola-rutina">{{ __('hola_rutina.titol-1') }}<span class="Darkline-text">{{ __('hola_rutina.titol-1.2') }}</span>{{ __('hola_rutina.titol-1.3') }}</h1>
            <div class="w-75 p-1 p-lg-5 primeros-parrafos">
                <p>{{ __('hola_rutina.parrafo-1') }} <span class="fw-bold">{{ __('hola_rutina.parrafo-1.1') }}</span></p>
                <p class="mt-4"><span class="fw-bold">{{ __('hola_rutina.parrafo-2') }}</span>{{ __('hola_rutina.parrafo-2.1') }}</p>
            </div>
        </div>


        <div class="w-100 d-flex flex-column flex-lg-row justify-content-center cont-level-2 pt-0 pt-lg-5 p-5">
            <div class="w-50 d-flex flex-column align-items-center mt-0 mt-lg-5 p-5 text-white">
                <div class="w-100 text-lg-start text-center">
                    <h2 class="titol-fatiga">{{ __('hola_rutina.titol-2') }}<span class="Darkline-text">{{ __('hola_rutina.titol-2.2') }}</span></h2>
                    <p class="segundo-parrafo">{{ __('hola_rutina.parrafo-3') }}</p>
                </div>
                <div class="w-100 tercer-parrafo pe-0 pe-lg-5 text-lg-start text-center">
                    <p>{{ __('hola_rutina.parrafo-3.1') }}</p>
                </div>
            </div>
            <div class="w-25 d-flex justify-content-center align-items-center pb-0 pb-lg-5 pt-0 pt-lg-5 p-5">
                <img class="gif-two" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/fatiga.gif') }}">
            </div>

        </div>

        <div class="w-100 d-flex justify-content-center p-5">
            <h2 class="titol-fatiga">{{ __('hola_rutina.titol-3') }}<span style="color: #BCCF88;" class="Darkline-text">{{ __('hola_rutina.titol-3.2') }}</span>{{ __('hola_rutina.titol-3.3') }}</h2>
        </div> 
        
        <div class="w-100 d-none d-lg-flex flex-column align-items-center text-center mt-5">
            <div class="w-100">
                <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/consejos1.png') }}">
            </div>
            <div class="w-100">
                <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/consejos2.png') }}">
            </div>
        </div>
        <div class="w-100 d-lg-none d-flex flex-column align-items-center text-center mt-5">
            <div class="w-100">
                <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/consejosM1.png') }}">
            </div>
            <div class="w-100">
                <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/consejosM2.png') }}">
            </div>
            <div class="w-100">
                <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/consejosM3.png') }}">
            </div>
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
                    class="p-privacity col-4">{{ __('contactologia.Politicas-privacidad') }}</a>
                <img class="d-block mx-auto logo-N col-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                    class="p-cookies col-4">{{ __('contactologia.Politicas-cookies') }}</a>
            </div>
            <?php
                }else{               
            ?>
            <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
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
</div>

@include('layouts.footer')
