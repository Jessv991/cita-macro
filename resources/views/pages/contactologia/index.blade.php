@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="banner-logo text-center">
            <img class="d-block mx-auto logo" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo.png') }}">
        </div>
        <div class="banner-pide-cita">
            <?php
                if($data['idioma']=='es'){
            ?>
                <img class="d-block mx-auto w-100 h-100" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner-pide-cita.jpg') }}">
            <?php
                }else{
            ?>
                <img class="d-block mx-auto w-100 h-100" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner-pide-cita.png') }}">
            <?php
                }
            ?>
        </div>
        <div class="text-center carousel-section">
            <?php
                if($data['tipo_dispositivo']!='mobile') {                   
            ?>
                <p class="d-block mx-auto pt-5 mb-0 title-carousel">{{ __('contactologia.Tipo-lentillas') }}<span class='line-view'>{{ __('contactologia.lentillas') }}</span>{{ __('contactologia.Tipo-lentillas-2') }}</p>
                <div class="text-start btn-area d-flex">
                    <div class="text-option w-25">
                        <p id="toggleCarousel1" class="option-btn w-100">{{ __('contactologia.Frecuencia') }}</p>
                        <p id="toggleCarousel2" class="option-btn w-100">{{ __('contactologia.Necesidad') }}</p>
                    </div>
                    <div class="w-75 images-btn-section" style="height: 400px; overflow: hidden;">
                        <div id="carouselExample1" class="carousel slide" style="display: none;">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block mx-auto p-1" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/btn1.png') }}" alt="Imagen 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block mx-auto p-1" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/btn2.png') }}" alt="Imagen 2">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>                      
                        <div id="carouselExample2" class="carousel slide" style="display: none;">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block mx-auto p-1" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/btn2-1.png') }}" alt="Imagen 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block mx-auto p-1" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/btn2-2.png') }}" alt="Imagen 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block mx-auto p-1" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/btn2-3.png') }}" alt="Imagen 2">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>                      
                    </div>
                </div>  
            <?php
                } else {                
            ?>
                <p class="d-block mx-auto pt-5 mb-0 title-carousel-mobile mb-5">{{ __('contactologia.Tipo-lentillas') }}<span class='line-view-mobile'>{{ __('contactologia.lentillas') }}</span>{{ __('contactologia.Tipo-lentillas-2') }}</p>
                <p id="toggleCarousel1" class="option-btn-mobile w-70">{{ __('contactologia.Frecuencia') }}</p>
                <div id="carouselContactologia" class="carousel slide pl-5 pr-5 ml-5 mr-5"> 
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active ml-5 mr-5">
                            <img class="d-block mx-auto p-1 img-mb" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/desktop'. '/' . $data['idioma'] . '/btn1.png') }}" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto p-1 img-mb" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/desktop'. '/' . $data['idioma'] . '/btn2.png') }}" alt="Imagen 2">
                        </div>
                    </div>                
                    <div class="d-flex justify-content-center mt-3 gap-3 mr-5 ml-5">
                        <button class="btn carousel-control-prev-mobile" type="button" data-bs-target="#carouselContactologia" data-bs-slide="prev">
                            &lt;
                        </button>
                        <button class="btn carousel-control-next-mobile" type="button" data-bs-target="#carouselContactologia" data-bs-slide="next">
                            &gt;
                        </button>
                    </div>
                </div>
                <p id="toggleCarousel2" class="option-btn-mobile w-100 mt-5">{{ __('contactologia.Necesidad') }}</p>
                <div id="carouselContactologia2" class="carousel slide pl-5 pr-5 ml-5 mr-5"> 
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <img class="d-block mx-auto p-1 img-mb" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/desktop'. '/' . $data['idioma'] . '/btn2-1.png') }}" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto p-1 img-mb" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/desktop'. '/' . $data['idioma'] . '/btn2-2.png') }}" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto p-1 img-mb" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/desktop'. '/' . $data['idioma'] . '/btn2-3.png') }}" alt="Imagen 2">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 gap-3">
                        <button class="btn carousel-control-prev-mobile" type="button" data-bs-target="#carouselContactologia2" data-bs-slide="prev">
                            &lt;
                        </button>
                        <button class="btn carousel-control-next-mobile" type="button" data-bs-target="#carouselContactologia2" data-bs-slide="next">
                            &gt;
                        </button>
                    </div>
                </div>                
            <?php
                }
            ?>                         
        </div>
        <div class="regular-questions">
            <p class="d-block mx-auto pt-5 mb-0 title-regular">{{ __('contactologia.Preguntas') }}<span class="line-view">{{ __('contactologia.Frecuentes') }}</span></p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ __('contactologia.Pregunta-beneficio') }}
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('contactologia.Respuesta-beneficio') }}
                        </div>
                    </div>
                </div>
            
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('contactologia.Pregunta-comodas') }}
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('contactologia.Respuesta-comodas') }}
                        </div>
                    </div>
                </div>
            
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ __('contactologia.Pregunta-ninos') }}
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('contactologia.Respuesta-ninos') }}
                        </div>
                    </div>
                </div>
            
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            {{ __('contactologia.Pregunta-graduacion') }}
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('contactologia.Respuesta-graduacion') }}
                        </div>
                    </div>
                </div>
            
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            {{ __('contactologia.Pregunta-ojos-secos') }}
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('contactologia.Respuesta-ojos-secos') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-100">
                <div class="form-section">
                    @include('form.pide_cita')
                </div>
        </div>
    </div>
    <footer class="row w-100">
        <?php
            if($data['tipo_dispositivo']!='mobile') {            
        ?>
            <div class="d-flex footer-contact text-center col-12">
                <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity col-4">{{__('contactologia.Politicas-privacidad')}}</a>
                <img class="d-block mx-auto logo-N col-4" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
                <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies col-4">{{__('contactologia.Politicas-cookies')}}</a>
            </div>            
        <?php
            }else{               
        ?>
           <div class="d-flex flex-column align-items-center footer-contact text-center mb-5">
            <img class="d-block mx-auto logo-N mt-5" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">            
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
</script>
@include('layouts.footer')