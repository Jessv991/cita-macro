@include('layouts.header')
<div class="background-container">
    <div class="background-item d-flex flex-column align-items-center">
        <div
            class="w-100 d-flex justify-content-center align-items-center {{ $data['tipo_dispositivo'] != 'mobile' ? 'position-fixed background-banner' : 'background-banner-mobile' }}">
            @if ($data['tipo_dispositivo'] == 'mobile')
                <div class="banner-logo-mobile d-flex justify-content-center align-items-center">
                    <img class="logo p-2" src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/logo.png') }}">
                </div>
            @else
                <div class="banner-logo w-100 d-flex justify-content-between align-items-center btn-wrapper-fixed">
                    <div class="img-logo">
                        <img class="logo ms-5"
                            src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/logo.png') }}"
                            alt="Logo">
                    </div>
                    <div class="btn-position me-5">
                        <button id="btn-flotante" class="btn btn-color-cita"
                            style="white-space: nowrap; padding: 10px;">
                            {{ __('form_translation.Pedir_cita') }}
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <div class="w-100 marg-img">
            <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/' . $data['tipo_dispositivo'] . '/banner.png') }}">
        </div>
        <div class="w-100 d-flex justify-content-center" style="background-color: #f7f4f2;">
            <div class="row w-100">
                <div class="col-12 col-lg-8 p-0">
                    <img class="w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/' . $data['tipo_dispositivo'] . '/img2.png') }}">
                </div>

                <div
                    class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start align-items-center p-0 mb-5">
                    <div class="video-container">
                        <video id="video2" playsinline preload="metadata">
                            <source src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/video.mp4') }}"
                                type="video/mp4">
                            Tu navegador no soporta vídeos HTML5.
                        </video>

                        <button id="playButton" class="video-play-button" aria-label="Reproducir vídeo">
                            <i class="fas fa-play"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100">
            <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/' . $data['tipo_dispositivo'] . '/img3.png') }}">
        </div>

        <div id="startForm" class="w-100  d-flex align-items-center justify-content-center pt-lg-5 contenedor_form">
            @include('form.pide_cita')
        </div>

        <footer class="row w-100 p-0">
            @if ($data['tipo_dispositivo'] != 'mobile')
                <div class="d-flex footer-contact text-center col-12">
                    <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                        class="p-privacity col-4 fw-bold">{{ __('actualiza.Politicas-privacidad') }}</a>
                    <img class="d-block mx-auto logo-N col-4"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/logo_colaborativo.png') }}"
                        alt="Logo footer">
                    <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                        class="p-cookies col-4 fw-bold">{{ __('actualiza.Politicas-cookies') }}</a>
                </div>
            @else
                <div class="d-flex flex-column align-items-center footer-contact text-center m-bottom">
                    <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2 fw-bold">
                        {{ __('actualiza.Politicas-privacidad') }}
                    </a>
                    <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1 fw-bold">
                        {{ __('actualiza.Politicas-cookies') }}
                    </a>
                    <img class="d-block mx-auto logo-N"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/adopta-un-abuelo/logo_colaborativo.png') }}"
                        alt="Logo footer">
                </div>
            @endif
        </footer>
    </div>
</div>

@if ($data['tipo_dispositivo'] == 'mobile')
    <div class="fixed-bottom-container justify-content-center align-items-center"
        onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
        <button id="btn-flotante" class="btn-bottom-center">{{ __('form_translation.Pedir_cita') }}</button>
    </div>
@endif

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

    const video = document.getElementById('video2');
    const playButton = document.getElementById('playButton');
    const container = document.querySelector('.video-container');

    playButton.addEventListener('click', function() {
        video.play();
    });

    video.addEventListener('play', function() {
        container.classList.add('playing');
    });

    video.addEventListener('ended', function() {
        container.classList.remove('playing');
    });

    video.addEventListener('pause', function() {
        container.classList.remove('playing');
    });

    updateSlides();
</script>
