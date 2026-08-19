@include('layouts.header')
<div class="background-container">
    <div class="background-item d-flex flex-column align-items-center">

        <div class="w-100 d-flex justify-content-center align-items-center {{ $data['tipo_dispositivo'] != 'mobile' ? 'position-fixed background-banner' : 'background-banner-mobile' }}">
            @if ($data['tipo_dispositivo'] == 'mobile')
                <div class="banner-logo-mobile d-flex justify-content-center align-items-center">
                    <img class="logo p-2"
                        src="{{ asset($data['rutaAsset'] . 'assets/logos/basicos/logo-audio-white.png') }}">
                </div>
            @else
                <div class="banner-logo w-100 d-flex justify-content-between align-items-center btn-wrapper-fixed">
                    <div class="img-logo">
                        <img class="logo ms-5"
                            src="{{ asset($data['rutaAsset'] . 'assets/logos/basicos/logo-audio-white.png') }}"
                            alt="Logo">
                    </div>
                    <div class="btn-position me-5">
                        <button id="btn-flotante" class="btn btn-color-cita">
                            {{ __('form_translation.Pedir_cita') }}
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <div class="w-100">
            <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/plan-renove/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center prim-text">
            <div class="w-100 d-flex justify-content-center">
                <img class="titulo_tu_vista2"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/plan-renove/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo1.png') }}">
            </div>
            <div class="p-1 primeros-parrafos1 text-width">
                <p>{!! __('plan-renove.parrafo-1') !!}</p>
            </div>
        </div>


        <div class="w-100 d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/plan-renove/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img1.png') }}">
            </div>
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center">
            <div class="w-100 d-flex justify-content-center">
                <img class="titulo_tu_vista1 mt-3"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/plan-renove/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}">
            </div>
            <div class="w-50 text-width">
                <img class="titulo_tu_vista1 {{ $data['tipo_dispositivo'] != 'mobile' ? 'mt-3' : 'mb-3' }}"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/plan-renove/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img3.png') }}">
            </div>
        </div>

        <div id="startForm" class="w-100  d-flex align-items-center justify-content-center mt-lg-5 contenedor_form">
            @include('form.pide_cita')
        </div>

        <footer class="row w-100 p-0">
            <?php
                if($data['tipo_dispositivo']!='mobile') {            
            ?>
            <div class="d-flex footer-contact text-center col-12">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                    class="p-privacity col-4 fw-bold">{{ __('plan-renove.Politicas-privacidad') }}</a>
                <img class="d-block mx-auto logo-N col-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N_2.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                    class="p-cookies col-4 fw-bold">{{ __('plan-renove.Politicas-cookies') }}</a>
            </div>
            <?php
                }else{               
            ?>
            <div class="d-flex flex-column align-items-center footer-contact text-center m-bottom">                
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2 fw-bold">
                    {{ __('plan-renove.Politicas-privacidad') }}
                </a>
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1 fw-bold">
                    {{ __('plan-renove.Politicas-cookies') }}
                </a>
                <img class="d-block mx-auto logo-N"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N_2.png') }}" alt="Logo footer">
            </div>
            <?php
                }
            ?>
        </footer>

    </div>
</div>

<?php
        if($data['tipo_dispositivo']=='mobile') {
    ?>

<div class="fixed-bottom-container justify-content-center align-items-center"
    onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
    <button id="btn-flotante" class="btn-bottom-center">{{ __('form_translation.Pedir_cita') }}</button>
</div>

<?php
        }
    ?>

@include('layouts.footer')

<script>
    const slides = document.querySelectorAll('.simple-carousel .slide');
    const indicators = document.querySelectorAll('.simple-carousel .indicator');

    let current = 0;

    function updateSlides() {
        slides.forEach((slide, i) => {
            slide.classList.remove('active', 'prev', 'next');

            if (i === current) {
                slide.classList.add('active');
            } else if (i === (current - 1 + slides.length) % slides.length) {
                slide.classList.add('prev');
            } else if (i === (current + 1) % slides.length) {
                slide.classList.add('next');
            }
        });

        indicators.forEach((ind, i) => {
            ind.classList.toggle('active', i === current);
        });
    }

    indicators.forEach((indicator, i) => {
        indicator.addEventListener('click', () => {
            current = i;
            updateSlides();
        });
    });

    document.getElementById('btn-flotante').addEventListener('click', function() {
        document.getElementById('startForm').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });

    // Inicializa la vista
    updateSlides();
</script>
