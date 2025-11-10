@include('layouts.header')
<div class="background-container">
    <div class="background-item d-flex flex-column align-items-center text-center">

        <div class="boton-flotante d-flex justify-content-end">

            <div class="w-100 d-flex flex-row">
                <div class="w-50 d-flex justify-content-start align-items-center">
                    <img class="logo" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo.png') }}"
                        alt="Logo">
                </div>
                <div class="w-50 d-flex justify-content-end align-items-center">
                    <a href="#contAllForm" id="diret-form"
                        class="btn btn-color2">{{ __('form_translation.Pedir_cita') }}</a>
                </div>
            </div>

        </div>

        <div class="w-100 m-banner">
            <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/campanya-nadal/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center mt-5">
            <div class="w-75 p-1 p-lg-5 primeros-parrafos1">
                <p>{{ __('campanya-nadal.parrafo-1') }}<span
                        class="texto-elegante">{{ __('campanya-nadal.parrafo-1.1') }}</span><span>{{ __('campanya-nadal.parrafo-1.2') }}</span>
                </p>
            </div>
        </div>


        <div class="w-100 d-none d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/campanya-nadal/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/familia.png') }}">
            </div>
        </div>

        <div class="w-100 d-lg-none d-flex flex-column align-items-center text-center">
            <div class="simple-carousel">
                <div class="slides">
                    <img src="{{ asset($data['rutaAsset'] . 'assets/img/campanya-nadal/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img1.png') }}"
                        class="slide active" alt="Slide 1" />
                    <img src="{{ asset($data['rutaAsset'] . 'assets/img/campanya-nadal/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}"
                        class="slide" alt="Slide 2" />
                    <img src="{{ asset($data['rutaAsset'] . 'assets/img/campanya-nadal/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img3.png') }}"
                        class="slide" alt="Slide 3" />
                </div>

                <div class="indicators">
                    <button class="indicator active" data-slide="0"></button>
                    <button class="indicator" data-slide="1"></button>
                    <button class="indicator" data-slide="2"></button>
                </div>
            </div>

        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center mt-3">
            <div class="w-100 p-1 p-lg-5 primeros-parrafos">
                <h2 class="subtitle">{{ __('campanya-nadal.subtitle') }}</h2>
                <p>{{ __('campanya-nadal.parrafo-2') }}</p>
            </div>
        </div>

        @if ($data['regal'] === 'true')
            <div class="w-100 mb-5">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/campanya-nadal/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/regalo.png') }}">
            </div>
        @endif

        <div class="w-100  d-flex align-items-center justify-content-center mt-5 contenedor_form">
            @include('form.pide_cita')
        </div>

        <footer class="row w-100 p-0">
            <?php
                if($data['tipo_dispositivo']!='mobile') {            
            ?>
            <div class="d-flex footer-contact text-center col-12">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                    class="p-privacity col-4 fw-bold">{{ __('contactologia.Politicas-privacidad') }}</a>
                <img class="d-block mx-auto logo-N col-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                    class="p-cookies col-4 fw-bold">{{ __('contactologia.Politicas-cookies') }}</a>
            </div>
            <?php
                }else{               
            ?>
            <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
                <img class="d-block mx-auto logo-N mt-5"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
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

    // Inicializa la vista
    updateSlides();
</script>
