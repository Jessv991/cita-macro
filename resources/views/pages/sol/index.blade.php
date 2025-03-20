@include('layouts.header')
<div class="row w-100 cont-all vh-100 w-100 p-0 m-0 h-100">

    <div class="col-12 p-0 m-0 lado-izq position-relative h-100">
        <div class="d-flex flex-column justify-content-center align-items-center w-100">
            <div class="col-12 w-100 d-flex flex-column justify-content-center align-items-center cont-top">
                <div class="col-12 p-0">
                    <div class="row">
                        <div class="col-6 p-0 d-flex justify-content-center align-items-center">
                            <h1 class="text-left">¿Cómo protejo<br>mis ojos del sol?</h1>
                        </div>
                        <div class="col-6 p-5 d-flex justify-content-center align-items-center">
                            <p class="text-right">Acude a tu óptica de confianza y elige unas gafas de sol que
                                realmente protejan tu vista. Nuestro equipo de profesionales
                                te asesorará para encontrar la mejor opción para ti.
                                <br><span class="fw-bold">¡No pongas en riesgo tu salud visual!</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carrusel w-75 mb-5 h-100">
                    <div class="carrusel-inner w-100">
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

            <div class="w-100 d-flex justify-content-center align-items-center">

                <div class="w-50 cont-test">

                </div>

            </div>

            <div class="cont-img">
                <img class="w-100 h-100"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/' . $data['tipo_dispositivo'] . '/playa.png') }}">
            </div>

            <div class="col-12 w-100 cont-bot">
                <div class="col-12 w-100 cont-bot1">

                    <div class="col-12 p-0 d-flex justify-content-center align-items-center mt-5">
                        <h1 class="text-left">¡Descubre los colores disponibles!</h1>
                    </div>

                    <div class="col-12 p-0 w-100 mt-5">

                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-3 p-0 d-flex justify-content-center align-items-center">
                                <img class="w-75 h-100"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/gris.svg') }}">
                            </div>
                            <div class="col-3 p-0 d-flex justify-content-center align-items-center">
                                <img class="w-75 h-100"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/marron.svg') }}">
                            </div>
                            <div class="col-3 p-0 d-flex justify-content-center align-items-center">
                                <img class="w-75 h-100"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/azul.svg') }}">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center mt-5">
                            <div class="col-3 p-0 d-flex justify-content-center align-items-center">
                                <img class="w-75 h-100"
                                    src="{{ asset($data['rutaAsset'] . 'assets/img/sol/amarillo.svg') }}">
                            </div>
                            <div class="col-3 p-0 d-flex justify-content-center align-items-center">
                                <img class="w-75 h-100"
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

            <div class="w-100 d-flex flex-column justify-content-center pt-5 text-left-2 bg-blaco">
                <span class="text-center">Nuestros centros</span>
                <span class="text-center">ópticos</span>
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
