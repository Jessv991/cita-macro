@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        @if ($data['tipo_dispositivo'] == 'mobile')
            <div class="banner-logo-mobile text-center">
                <img class="d-block mx-auto logo"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo.png') }}">
            </div>
        @else
            <div class="banner-logo d-flex justify-content-between align-items-center btn-wrapper-fixed">
                <div class="img-logo">
                    <img class="logo" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo.png') }}"
                        alt="Logo">
                </div>
                <div class="btn-position">
                    <button id="btn-flotante"
                        class="btn btn-color-cita">{{ __('form_translation.Pedir_cita') }}</button>
                </div>
            </div>
        @endif
    </div>
    <div class="banner-pide-cita">
        <?php
                if($data['tipo_dispositivo']!='mobile'){
            ?>
        <img class="d-block mx-auto w-75 h-75"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner_miopia_pc.jpg') }}">
        <?php
                }else{
            ?>
        <img class="d-block mx-auto w-100 h-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner_miopia.jpg') }}">
        <?php
                }
            ?>
    </div>
    <div class="text-center">
        <?php
                if($data['tipo_dispositivo']!='mobile'){
            ?>
        <p class="d-block mx-auto pt-5 mb-0 title-carousel">La <span
                class="color">{{ __('miopia-infantil.miopia') }}</span> {{ __('miopia-infantil.problema') }}</p>
        <img class="d-block mx-auto w-75 h-75"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/datos_miopia_pc.png') }}">
        <?php
                }else{
            ?>
        <p class="d-block mx-auto pt-5 mb-0 title-carousel-mobile mb-5">La <span
                class="color">{{ __('miopia-infantil.miopia') }}</span> {{ __('miopia-infantil.problema') }}</p>
        <img class="d-block mx-auto w-100 h-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/datos_miopia.png') }}">
        <?php
                }
            ?>
    </div>
    <div class="carousel">
        <?php
                if($data['tipo_dispositivo']!='mobile'){
            ?>
        <img class="d-block mx-auto w-50 h-50 pt-5"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo_causas.png') }}"
            alt="titulo causas">
        <div class="text-start btn-area d-flex">
            <div class="text-option w-25">
                <p id="toggleCarousel1" class="option-btn w-100">{{ __('miopia-infantil.geneticos') }}</p>
                <p id="toggleCarousel2" class="option-btn w-100">{{ __('miopia-infantil.socioculturales') }}</p>
            </div>
            <div class="w-75 images-btn-section" style="height: 450px; overflow: hidden;">
                <div id="carouselExample1" class="carousel slide" style="display: none;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block mx-auto p-1 w-50"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/22.png') }}"
                                alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto p-1 w-50"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/31.png') }}"
                                alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto p-1 w-50"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/46.png') }}"
                                alt="Imagen 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div id="carouselExample2" class="carousel slide" style="display: none;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block mx-auto p-1 w-50"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/academica.png') }}"
                                alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto p-1 w-50"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/aire_libre.png') }}"
                                alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto p-1 w-50"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/movil.png') }}"
                                alt="Imagen 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <?php
                }else{
            ?>
        <img class="d-block mx-auto w-100 h-100 pt-5"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo_causas.png') }}"
            alt="titulo causas">
        <p id="toggleCarousel1" class="option-btn-mobile text-center pt-5 w-70">{{ __('miopia-infantil.geneticos') }}
        </p>
        <div id="carouselContactologia" class="carousel slide pl-5 pr-5 ml-5 mr-5">
            <div class="carousel-inner text-center">
                <div class="carousel-item active ml-5 mr-5">
                    <img class="d-block mx-auto p-1 img-mb w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/mobile' . '/' . $data['idioma'] . '/22.png') }}"
                        alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto p-1 img-mb w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/mobile' . '/' . $data['idioma'] . '/31.png') }}"
                        alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto p-1 img-mb w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/mobile' . '/' . $data['idioma'] . '/46.png') }}"
                        alt="Imagen 3">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3 gap-3 mr-5 ml-5">
                <button class="btn carousel-control-prev-mobile" type="button"
                    data-bs-target="#carouselContactologia" data-bs-slide="prev">
                    &lt;
                </button>
                <button class="btn carousel-control-next-mobile" type="button"
                    data-bs-target="#carouselContactologia" data-bs-slide="next">
                    &gt;
                </button>
            </div>
        </div>
        <p id="toggleCarousel2" class="option-btn-mobile text-center w-100 mt-5">
            {{ __('miopia-infantil.socioculturales') }}</p>
        <div id="carouselContactologia2" class="carousel slide pl-5 pr-5 ml-5 mr-5">
            <div class="carousel-inner text-center">
                <div class="carousel-item active">
                    <img class="d-block mx-auto p-1 img-mb w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/mobile' . '/' . $data['idioma'] . '/academica.png') }}"
                        alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto p-1 img-mb w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/mobile' . '/' . $data['idioma'] . '/aire_libre.png') }}"
                        alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto p-1 img-mb w-100"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/mobile' . '/' . $data['idioma'] . '/movil.png') }}"
                        alt="Imagen 2">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3 gap-3 pb-5">
                <button class="btn carousel-control-prev-mobile" type="button"
                    data-bs-target="#carouselContactologia2" data-bs-slide="prev">
                    &lt;
                </button>
                <button class="btn carousel-control-next-mobile" type="button"
                    data-bs-target="#carouselContactologia2" data-bs-slide="next">
                    &gt;
                </button>
            </div>
        </div>
        <?php
                }
            ?>
    </div>
    <div class="text-center">
        <?php
                if($data['tipo_dispositivo']!='mobile'){
            ?>
        <img class="d-block mx-auto w-50 h-50 pt-5"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo_frenar_miopia.png') }}">
        <p class="cuidar-vision">{{ __('miopia-infantil.cuidar-vision') }}</p>
        <img class="d-block mx-auto w-75 h-75"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/prevencion_pc.png') }}">
        <?php
                } else {
            ?>
        <img class="d-block mx-auto w-100 h-100 pt-5"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/frenar_miopia.png') }}">
        <p class="cuidar-vision text-mobile">{{ __('miopia-infantil.cuidar-vision') }}</p>
        <img class="d-block mx-auto w-100 h-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/vuelta-al-cole/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/prevencion.png') }}">
        <?php
                }
            ?>
    </div>
    <div class="h-100 pt-5">
        <div class="form-section">
            @include('form.pide_cita')
        </div>
    </div>

    <?php
        if($data['tipo_dispositivo']=='mobile') {
    ?>
        <div class="fixed-bottom-container justify-content-center align-items-center" onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
            <button class="btn-bottom-center">{{ __('form_translation.Pedir_cita') }}</button>
        </div>
    <?php
        }
    ?>

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

    const carousel1 = document.getElementById("carouselExample1");
    const carousel2 = document.getElementById("carouselExample2");
    const toggleButton1 = document.getElementById("toggleCarousel1");
    const toggleButton2 = document.getElementById("toggleCarousel2");

    toggleButton1.style.fontWeight = "500";
    toggleButton2.style.fontWeight = "100";

    carousel1.style.display = "block";
    carousel2.style.display = "none";

    carousel1.classList.remove('fade-out', 'slide-out-left');
    carousel1.classList.add('fade-in', 'slide-in-left');

    toggleButton1.addEventListener("click", function() {
        carousel1.style.display = "block";
        carousel2.style.display = "none";
        toggleButton1.style.fontWeight = "500";
        toggleButton2.style.fontWeight = "100";
        carousel1.classList.remove('fade-out', 'slide-out-left');
        carousel1.classList.add('fade-in', 'slide-in-left');
    });

    toggleButton2.addEventListener("click", function() {
        toggleButton1.style.fontWeight = "100";
        toggleButton2.style.fontWeight = "500";
        carousel2.style.display = "block";
        carousel1.style.display = "none";
        carousel2.classList.remove('fade-out', 'slide-out-left');
        carousel2.classList.add('fade-in', 'slide-in-left');
    });

    $('#btn-flotante').on('click', function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('#formMacroContactologia').offset().top
        }, 300);
    });
</script>
@include('layouts.footer')
