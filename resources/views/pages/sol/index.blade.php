@include('layouts.header')
<div class="row w-100 cont-all vh-100 w-100 p-0 m-0 h-100">

    <div class="col-12 p-0 m-0 lado-izq position-relative h-100">
        <div class="d-flex flex-column justify-content-center align-items-center w-100">
            <div id="cont-top"
                class="col-12 w-100 d-flex flex-column justify-content-center align-items-center cont-top">
                <div class="col-12 p-0">
                    <div class="row flex-column flex-lg-row w-100"> <!-- Apila en móviles, mantiene en desktop -->
                        <div class="col-lg-6 col-12 p-0 d-flex justify-content-center align-items-center">
                            <h1 id="text-left" class="text-left">¿Cómo protejo<br>mis ojos del sol?</h1>
                        </div>
                        <div
                            class="col-lg-6 col-12 text-center text-md-start p-5 d-flex justify-content-center align-items-center">
                            <p id="text-right" class="text-right">Acude a tu óptica de confianza y elige unas gafas de
                                sol que
                                realmente protejan tu vista. Nuestro equipo de profesionales
                                te asesorará para encontrar la mejor opción para ti.
                                <br><span class="fw-bold">¡No pongas en riesgo tu salud visual!</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carrusel w-75 mb-5 h-lg-100">
                    <div id="carrusel-inner" class="carrusel-inner w-100">
                        <img class="w-100 h-100 active"
                            src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/girl.png') }}">
                        <img class="w-100 h-100"
                            src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/man.png') }}">
                        <img class="w-100 h-100"
                            src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/woman.png') }}">
                        <img class="w-100 h-100"
                            src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/grandpa.png') }}">
                        <img class="w-100 h-100 extra-img"
                            src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/gafas-sol.png') }}">
                    </div>
                </div>
            </div>

            <div class="w-50 d-flex justify-content-center align-items-center">

                <div class="w-100 cont-test d-flex justify-content-center align-items-center">

                    <div class="w-75">
                        <div class="text-center">
                            <h3 class="title-test">¿Qué color de lente<br><span> se adapta mejor a ti?</span></h1>
                                <p class="subtitle-test">Elige las opciones que mejor se adapten a tu estilo de vida y
                                    te diremos qué color de lentes es ideal para ti.</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center w-100">
                            <div class="accordion accordion-flush w-100" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed fw-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            ¿En qué situaciones sueles usar gafas de sol?
                                        </button>
                                    </h2>

                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div id="#grises" class="accordion-body brc">Conducir o ir en moto</div>
                                        <div id="verdes" class="accordion-body brc">Hacer deporte al aire libre</div>
                                        <div id="marrones" class="accordion-body brc">Ir a la playa o la montaña</div>
                                        <div id="amarillas" class="accordion-body brc">Usarlas en el día a día, incluso en ciudad</div>
                                        <div id="azules" class="accordion-body brc">Para actividades náuticas o de alta luminosidad</div>
                                    </div>
                                    
                                </div>
                                <div class="accordion-item mt-2">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed fw-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            ¿Cuál de estos problemas visuales te molesta más?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div id="azules" class="accordion-body brc">El deslumbramiento del sol en la carretera o en el agua</div>
                                        <div id="verdes" class="accordion-body brc">Fatiga visual después de varias horas expuesto al sol</div>
                                        <div id="grises" class="accordion-body brc">Dificultad para ver bien los colores con luz intensa</div>
                                        <div id="amarillas" class="accordion-body brc">Necesidad de mayor contraste en días nublados o con poca luz</div>
                                        <div id="marrones" class="accordion-body brc">Sensación de que la luz es demasiado intensa en todo momento</div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-2">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed fw-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            ¿Qué sensación te gusta más al usar gafas de sol?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div id="grises" class="accordion-body brc">Ver los colores de forma natural sin alteraciones</div>
                                        <div id="marrones" class="accordion-body brc">Tener una visión más cálida y relajada</div>
                                        <div id="azules" class="accordion-body brc">Reducir los reflejos para una visión más nítida</div>
                                        <div id="amarillas" class="accordion-body brc">Ver con más brillo y contraste en días nublados</div>
                                        <div id="verdes" class="accordion-body brc">Tener una visión más fresca y con menos fatiga</div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item mt-2">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed fw-bold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                            ¿Qué actividad realizas con más frecuencia al aire libre?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div id="marrones" class="accordion-body brc">Senderismo o montaña</div>
                                        <div id="verdes" class="accordion-body brc">Deportes como ciclismo o running</div>
                                        <div id="azules" class="accordion-body brc">Navegación o deportes acuáticos</div>
                                        <div id="amarillas" class="accordion-body brc">Trabajo al aire libre o exposición prolongada al sol</div>
                                        <div id="grises" class="accordion-body brc">Paseos o turismo en ciudad</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <div class="cont-img">
                <img class="w-100 h-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/playa.png') }}">
            </div>

            <div class="col-12 w-100 cont-bot">
                <div class="col-12">

                    <div class="col-12 p-0 text-center d-flex justify-content-center align-items-center mt-5">
                        <h1 class="text-left">¡Descubre los colores disponibles!</h1>
                    </div>

                    <div class="col-12 p-0 mt-5">

                        <div class="row flex-column flex-lg-row d-flex justify-content-center align-items-center w-100">
                            <div
                                id="img-gris" class="col-lg-3 col-12 p-0 d-flex justify-content-center align-items-center mt-5 mt-lg-0">
                                <img class="w-75 h-100 img-w"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/gris.svg') }}">
                            </div>
                            <div
                                id="img-marron" class="col-lg-3 col-12 p-0 d-flex justify-content-center align-items-center mt-5 mt-lg-0">
                                <img class="w-75 h-100 img-w"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/marron.svg') }}">
                            </div>
                            <div
                                id="img-azul" class="col-lg-3 col-12 p-0 d-flex justify-content-center align-items-center mt-5 mt-lg-0">
                                <img class="w-75 h-100 img-w"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/azul.svg') }}">
                            </div>
                        </div>
                        <div
                            class="row flex-column flex-lg-row d-flex justify-content-center align-items-center w-100 mt-5">
                            <div d="img-amarillo" class="col-lg-3 col-12 p-0 d-flex justify-content-center align-items-center">
                                <img class="w-75 h-100 img-w"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/amarillo.svg') }}">
                            </div>
                            <div
                                id="img-verde" class="col-lg-3 col-12 p-0 d-flex justify-content-center align-items-center mt-5 mt-lg-0">
                                <img class="w-75 h-100 img-w"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/verde.svg') }}">
                            </div>
                        </div>

                    </div>

                    <div class="w-100 mt-5 mb-5">
                        <img class="w-100 h-100"
                            src="{{ asset($data['rutaAsset'] . 'assets/img/sol/imgBottom.png') }}">
                    </div>
                </div>
            </div>



            {{-- <div class="w-100 d-flex justify-content-center align-items-center mt-lg-0 mt-5">
                <div class="style-tarj w-md-50 w-75 d-flex justify-content-center align-items-center" data-aos="flip-left"
                    data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    @include('test.index')
                </div>
            </div> --}}

            <div class="w-100 d-flex flex-column justify-content-center p-0 text-left-2 bg-blaco">
                <span class="text-center">Nuestros centros ópticos</span>
            </div>

            <div class="w-100 bg-blaco bg-blaco pt-5">
                @include('map.index')
            </div>
            <div class="w-100 bg-blaco">
                @include('layouts.footer_view')
            </div>
        </div>

    </div>

    <div
        class="col-lg-4 h-100 p-0 m-0 lado-der d-flex justify-content-center align-items-center position-relative d-none">
        <div class="cont-form-principal position-fixed d-flex justify-content-center align-items-center">
            <button class="btn-close">×</button>
            @include('form.pide_cita')
        </div>

    </div>

</div>

@include('form.boton_flotante')

<div class="form_flotante d-flex justify-content-center align-items-center d-lg-none d-none">
    <button class="btn-close-flotante">×</button>
    @include('form.pide_cita')
</div>


@include('layouts.footer')
