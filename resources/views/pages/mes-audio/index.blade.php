@include('layouts.header')
<div class="background-container">
    <div class="background-item d-flex flex-column align-items-center">

        <div class="boton-flotante d-flex justify-content-end">

            <div class="w-100 d-flex flex-row">
                <div class="w-50 d-flex justify-content-start align-items-center">
                    <img class="logo" src="{{ asset($data['rutaAsset'] . 'assets/logos/basicos/logo.png') }}"
                        alt="Logo">
                </div>
                <div class="w-50 d-flex justify-content-end align-items-center">
                    <a href="#startForm" id="diret-form"
                        class="btn btn-color2">{{ __('form_translation.Pedir_cita') }}</a>
                </div>
            </div>

        </div>

        <div class="w-100 m-banner">
            <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/mes-audio/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center prim-text">
            <div class="w-100 d-flex justify-content-center">
                <img class="titulo_tu_vista2"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/mes-audio/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/texto1.png') }}">
            </div>
            <div class="w-75 p-1 primeros-parrafos1">
                <p>{{ __('mes-audio.parrafo-1') }}</p>
            </div>
        </div>


        <div class="w-100 d-none d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/mes-audio/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/puzzle.png') }}">
            </div>
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center mt-5">
            <div class="w-100 d-flex justify-content-center mt-5">
                <img class="titulo_tu_vista1 mt-3"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/mes-audio/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/texto2.png') }}">
            </div>
            <div class="w-75 p-1 primeros-parrafos1">
                <p>{{ __('mes-audio.parrafo-1.1') }}</p>
            </div>
        </div>

        <div class="w-100 d-none d-lg-flex flex-column align-items-center text-center">
            <div class="w-100">
                <img class="w-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/mes-audio/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/bolas.png') }}">
            </div>
        </div>

        <div class="w-100 d-none d-lg-flex flex-column align-items-center text-center img-pdf">
            <div class="w-100">
                <a href="{{ asset('assets/media/landings/mes-audio/LIBRO ACTIVIDADES_NATURAL AUDIO.pdf') }}" download>
                    <img class="w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/mes-audio/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/actividades.png') }}">
                </a>
            </div>
        </div>


        <div class="w-100 d-flex flex-column align-items-center text-center">
            <div class="w-100 d-flex justify-content-center">
                <img class="titulo_tu_vista1"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/mes-audio/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/texto3.png') }}">
            </div>
            <div class="w-75 p-1 primeros-parrafos1">
                <p>{{ __('mes-audio.parrafo-1.2') }}</p>
            </div>
        </div>

        <div  id="startForm" class="w-100  d-flex align-items-center justify-content-center mt-5 contenedor_form">
            @include('form.pide_cita')
        </div>

        <footer class="row w-100 p-0">
            <?php
                if($data['tipo_dispositivo']!='mobile') {            
            ?>
            <div class="d-flex footer-contact text-center col-12">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                    class="p-privacity col-4 fw-bold">{{ __('mes-audio.Politicas-privacidad') }}</a>
                <img class="d-block mx-auto logo-N col-4"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N_Violet.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                    class="p-cookies col-4 fw-bold">{{ __('mes-audio.Politicas-cookies') }}</a>
            </div>
            <?php
                }else{               
            ?>
            <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
                <img class="d-block mx-auto logo-N mt-5"
                    src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/N_Violet.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2 fw-bold">
                    {{ __('mes-audio.Politicas-privacidad') }}
                </a>
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1 fw-bold">
                    {{ __('mes-audio.Politicas-cookies') }}
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
