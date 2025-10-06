@include('layouts.header')
    <div class="background-container">
        <div class="background-item">

            <div class="boton-flotante d-flex justify-content-end">

                <div class="w-100 d-flex flex-row">
                    <div class="w-50 d-flex justify-content-start">
                        <img class="logo" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo.png') }}"
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
                    src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.jpg') }}">
            </div>

            <div class="w-100 d-flex flex-column align-items-center text-center mt-5">
                <div class="w-75 p-1 p-lg-5 primeros-parrafos">
                    <p>{{ __('progresivos.parrafo-1') }}<span class="fw-bold">{{ __('progresivos.parrafo-1.1') }}</span><span>{{ __('progresivos.parrafo-1.2') }}</span>
                    </p>
                </div>
            </div>

            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/beneficios.png') }}">
            </div>

            <div class="w-100 d-flex justify-content-center mt-4">
                <img class="titulo_tu_vista"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo2.png') }}">
            </div>

            <div class="w-100 d-flex flex-column align-items-center text-center mt-3">
                <div class="w-100 p-1 p-lg-5 primeros-parrafos">
                    <p>{{ __('progresivos.parrafo-2') }}</p>
                </div>
            </div>

            <div class="w-100 d-none d-lg-flex flex-column align-items-center text-center">
                <div class="w-100">
                    <img class="w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/lentes.png') }}">
                </div>
            </div>

            <div class="w-100 d-lg-none d-flex flex-column align-items-center text-center">
                <div class="simple-carousel">
                    <div class="slides">
                        <img src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img1.png') }}" class="slide active" alt="Slide 1" />
                        <img src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img2.png') }}" class="slide" alt="Slide 2" />
                        <img src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img3.png') }}" class="slide" alt="Slide 3" />
                        <img src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img4.png') }}" class="slide" alt="Slide 4" />
                    </div>
                    <button class="prev">‹</button>
                    <button class="next">›</button>
                    <div class="indicators">
                        <button class="indicator active" data-slide="0"></button>
                        <button class="indicator" data-slide="1"></button>
                        <button class="indicator" data-slide="2"></button>
                        <button class="indicator" data-slide="3"></button>
                    </div>
                </div>
            </div>

            <div class="w-100 d-flex flex-column align-items-center text-center mt-3">
                <div class="w-100 p-1 p-lg-5 primeros-parrafos">
                    <p>{{ __('progresivos.parrafo-3') }}</p>
                </div>
            </div>

            <div class="w-100  d-flex align-items-center justify-content-center mt-5 contenedor_form">
                @include('form.pide_cita')
            </div>

            <div class="w-100 d-flex justify-content-center mt-4">
                <img class="titulo_tu_vista2"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo3.png') }}">
            </div>

            <footer class="row w-100">
                <?php
                if($data['tipo_dispositivo']!='mobile') {            
            ?>
                <div class="d-flex footer-contact text-center col-12">
                    <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                        class="p-privacity col-4 fw-bold">{{ __('contactologia.Politicas-privacidad') }}</a>
                    <img class="d-block mx-auto logo-N col-4"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}"
                        alt="Logo footer">
                    <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                        class="p-cookies col-4 fw-bold">{{ __('contactologia.Politicas-cookies') }}</a>
                </div>
                <?php
                }else{               
            ?>
                <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
                    <img class="d-block mx-auto logo-N mt-5"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}"
                        alt="Logo footer">
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
        const prevBtn = document.querySelector('.simple-carousel .prev');
        const nextBtn = document.querySelector('.simple-carousel .next');
        const indicators = document.querySelectorAll('.simple-carousel .indicator');

        let current = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            indicators[i].classList.toggle('active', i === index);
            });
            current = index;
        }

        prevBtn.addEventListener('click', () => {
            let nextIndex = (current - 1 + slides.length) % slides.length;
            showSlide(nextIndex);
        });

        nextBtn.addEventListener('click', () => {
            let nextIndex = (current + 1) % slides.length;
            showSlide(nextIndex);
        });

        indicators.forEach((indicator, i) => {
            indicator.addEventListener('click', () => {
            showSlide(i);
            });
        });

        // Opcional: auto avance cada 5 segundos
        /* setInterval(() => {
            let nextIndex = (current + 1) % slides.length;
            showSlide(nextIndex);
        }, 5000); */
    </script>
