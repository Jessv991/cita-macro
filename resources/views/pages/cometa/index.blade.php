
@include('layouts.header')

<div class="main-div" style="background-color:#f7f0e9;">
    <div class="banner">
    </div>
    <div class="paso-card-div d-block mx-auto">
        <div class="paso-card-div-mobile-top d-block mx-auto">
            <img class="materiales-board-image mx-auto d-block" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/MATERIALES-NECESARIOS.png')}}" alt="">
            <div class="d-flex w-100" style="height:15%;">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_tijera.png')}}" alt="">
                                <p>Tijeras</p>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_regla.png')}}" alt="">
                                <p>Regla</p>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_varillas.png')}}" alt="">
                                <p>2 Varillas</p>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_papel.png')}}" alt="">
                                <p>Papel de seda</p>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_pegamento.png')}}" alt="">
                                <p>Pegamento</p>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_lapiz.png')}}" alt="">
                                <p>Lápiz</p>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_hilo.png')}}" alt="">
                                <p>Cuerda / hilo</p>
                            </div>
                        </div>
                        <div class="col-4 col-md-3 d-flex justify-content-center">
                            <div class="materiales-element-div mt-5">
                                <img class="materiales-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_cinta.png')}}" alt="">
                                <p>Cinta adhesiva</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="paso-card-div-mobile-bottom d-block mx-auto">
            <img class="paso-board-image mb-1 mx-auto d-block" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/PASO-A-PASO.png')}}" alt="">
            <div class="paso-outer-image-text-div">
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_1.png')}}" alt="">
                    <p class="mt-4">Coloca las varillas en cruz dejando un margen superior de 5cm en la varilla vertical y 25cm a cada lado en la varilla horizontal. Únelas bien con cuerda o cinta adhesiva.</p>
                </div>
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_2.png')}}" alt="">
                    <p class="mt-4">Ata un hilo a cada uno de los extremos de la cruz, pasándolo varias veces por cada extremo, hasta formar un rombo. Refuerza con cinta adhesiva si fuera necesario.</p>
                </div>
            </div>
            <div class="paso-outer-image-text-div">
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_3.png')}}" alt="">
                    <p class="mt-4">Dibuja la forma de la cometa en el papel de seda dejando un margen de 4–5 cm y recorta la forma con ayuda de las tijeras.</p>
                </div>
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_4.png')}}" alt="">
                    <p class="mt-4">Pega el papel sobrante por encima de los hilos. Utiliza cinta adhesiva para reforzar la unión con las varillas en ambas caras de la cometa.</p>
                </div>
            </div>
            <div class="paso-outer-image-text-div">
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_5.png')}}" alt="">
                    <p class="mt-4">Haz pequeños agujeros en los extremos de la cometa y pasa una cuerda de 60cm por el eje vertical y una de 50cm por el horizontal.</p>
                </div>
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_6.png')}}" alt="">
                    <p class="mt-4">Haz un nudo para unir ambas cuerdas con la bobina de cuerda</p>
                    <p>El nudo debe quedar centrado, a la altura del eje central de la cometa.</p>
                </div>
            </div>
            <div class="paso-outer-image-text-div">
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_7.png')}}" alt="">
                    <p class="mt-4">Crea una cola de aproximadamente 3m y pégala bien con pegamento al extremo inferior de la cometa.</p>
                </div>
                <div class="paso-image-text-inner-div">
                    <img class="paso-image" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_8.png')}}" alt="">
                    <p class="mt-4">Termina de decorar la cometa al gusto y ya estará lista para sacarla a volar!</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-5">
        <img class="reto-board-image mb-3 mx-auto d-block" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/UNETE-AL-RETO.png')}}" alt="">
        <p>Comparte una foto volando tu cometa en Instagram con el <strong>hashtag #RetoSinPantallas.</strong> No te olvides de etiquetar a tu centro Natural Optics más cercano y a @naturalopticsoficial para entrar en el sorteo de un <strong>¡Pack de Vuelta al Cole!</strong></p>
        <div class="mt-5">
            <img class="d-block mx-auto logo-N col-4" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
        </div>
    </footer>
@include('layouts.footer')
