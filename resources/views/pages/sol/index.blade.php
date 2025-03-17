@include('layouts.header')

<div class="background-container w-100">
    <div class="background-item w-100">
        <div class="col-12 p-0 m-0 w-100">
            <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
            <div class="row p-0 m-0 mt-5">
                <!-- Columna para la primera imagen -->
                <div class="col-12 col-lg-5 p-0 m-0 d-flex justify-content-center">
                    <img class="w-75 img-regalo" src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/regalo.png') }}">
                </div>
            
                <!-- Columna para la segunda imagen -->
                <div class="col-12 col-lg-7 p-0 m-0 d-flex justify-content-center">
                    <img class="w-75 img-promo" src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/promo.png') }}">
                </div>
            </div>

            <div class="w-90 d-flex flex-column align-items-center">
                <div class="linea mb-3" data-aos="fade-right"></div>
            </div>
            
            
            <div class="w-100 d-flex flex-column align-items-center d-none d-lg-flex">
                <img class="w-75" src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/filtro.png') }}">
            </div>

            <div class="row p-0 m-0 mt-5 d-lg-none d-flex justify-content-center">
                <div class="col-12 col-lg-5 p-0 m-0 d-flex justify-content-center">
                    <img class="w-75 img-descubre" src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/descubre.png') }}">
                </div>

                <div class="col-12 col-lg-7 p-0 m-0 d-flex justify-content-center">
                    <img class="w-75 img-cards" src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/cards.png') }}">
                </div>
            </div>


            <div class="col-12 w-100 p-0 m-0 mt-lg-5 d-flex justify-content-center">
                <div class="row w-100 d-flex justify-content-center mt-5">

                    <div class="col-6 col-lg-2 p-0 m-0">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="orang1" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/orang1.png') }}">
                        </div>
                        <div class="col-12 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="orang2" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/orang2.png') }}">
                        </div>
                    </div>
            
                    <!-- Segunda columna -->
                    <div class="col-6 col-lg-2 p-0 m-0">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="yell1" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/yell1.png') }}">
                        </div>
                        <div class="col-12 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="yell2" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/yell2.png') }}">
                        </div>
                    </div>
                    
            
                    <!-- Tercera columna -->
                    <div class="col-6 col-lg-2 p-0 m-0 mt-lg-0 mt-3">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="red1" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/red1.png') }}">
                        </div>
                        <div class="col-12 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="red2" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/red2.png') }}">
                        </div>
                    </div>
            
                    <!-- Cuarta columna -->
                    <div class="col-6 col-lg-2 p-0 m-0 mt-lg-0 mt-3">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="green1" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/green1.png') }}">
                        </div>
                        <div class="col-12 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="green2" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/green2.png') }}">
                        </div>
                    </div>
            
                    <!-- Quinta columna -->
                    <div class="col-6 col-lg-2 p-0 m-0 mt-lg-0 mt-3">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="blu1" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/blu1.png') }}">
                        </div>
                        <div class="col-12 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="blu2" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/blu2.png') }}">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5 filtre-text">
                <p>{{ __('sol.filtro-1') }}</p>
                <p>{{ __('sol.filtro-2') }}</p>
            </div>

            <div class="w-100 d-flex justify-content-center align-items-center">
                <div class="linea2" data-aos="fade-left"></div>
            </div>

            <div class="text-center mt-5">
                <p class="filtre-text">{{ __('sol.proteger-1') }}<span class="text-darkline">
                        {{ __('sol.proteger-2') }}</span><span class="filtre-text">
                        {{ __('sol.proteger-3') }}</span></p>
            </div>

            <div class="col-12 w-100 p-0 m-0 mt-lg-5 mt-md-0 d-flex justify-content-center">
                <div class="row w-100 d-flex justify-content-center mt-5">
                    <!-- Primera columna (aparece en fila en dispositivos grandes, apilada en móviles) -->
                    <div class="col-12 col-lg-3 p-5 m-0">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="girl" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/girl.png') }}">
                        </div>
                        <div class="col-12 p-5 m-0 mt-3 w-100 p-table">
                            <h4 class="t-circle">{{ __('sol.infancia') }}</h4>
                            <p class="t-p-circle">{{ __('sol.infancia-1') }}</p>
                            <p class="t-p-circle">{{ __('sol.infancia-2') }}</p>
                            <p class="t-p-circle">{{ __('sol.infancia-3') }}</p>
                            <p class="t-p-circle">{{ __('sol.infancia-4') }}</p>
                        </div>
                    </div>
            
                    <!-- Segunda columna -->
                    <div class="col-12 col-lg-3 p-5 m-0">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="man" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/man.png') }}">
                        </div>
                        <div class="col-12 p-5 m-0 mt-3 w-100 p-table">
                            <h4 class="t-circle">{{ __('sol.joven') }}</h4>
                            <p class="t-p-circle">{{ __('sol.joven-1') }}</p>
                            <p class="t-p-circle">{{ __('sol.joven-2') }}</p>
                            <p class="t-p-circle">{{ __('sol.joven-3') }}</p>
                            <p class="t-p-circle">{{ __('sol.joven-4') }}</p>
                            <p class="t-p-circle">{{ __('sol.joven-5') }}</p>
                        </div>
                    </div>
            
                    <!-- Tercera columna -->
                    <div class="col-12 col-lg-3 p-5 m-0">
                        <div class="col-12 p-0 m-0 d-flex justify-content-center w-100" data-aos="flip-left">
                            <img id="grandmom" class="w-75"
                                src="{{ asset($data['rutaAsset'] . 'assets/img/sol/desktop/' . $data['idioma'] . '/grandmom.png') }}">
                        </div>
                        <div class="col-12 p-5 m-0 mt-3 w-100 p-table">
                            <h4 class="t-circle">{{ __('sol.senior') }}</h4>
                            <p class="t-p-circle">{{ __('sol.senior-1') }}</p>
                            <p class="t-p-circle">{{ __('sol.senior-2') }}</p>
                            <p class="t-p-circle">{{ __('sol.senior-3') }}</p>
                            <p class="t-p-circle">{{ __('sol.senior-4') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cont-form w-100 col-12 p-0 m-0 d-flex justify-content-center align-items-center">
                <div class="w-lg-50 w-md-100">
                    @include('form.pide_cita')
                </div>
            </div>

        </div>
    </div>
</div>

@include('layouts.footer')
