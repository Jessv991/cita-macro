
@include('layouts.header')

<div class="" style="background-color:#f7f0e9; height:762vh;">
    <div style="height:102vh; width:100vw; background-image: url({{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/BANNER-COMETA-PC.png') }})">
        {{-- <img src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/BANNER-COMETA-PC.png') }}"> --}}
    </div>
    <div style="background:#00cf0a; height:560vh; width:90vw; border-radius:7.5rem; margin-left:auto; margin-right:auto; display: block">
            <img style="width: 40%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/MATERIALES-NECESARIOS.png')}}" alt="">
        <div style="display: flex; height:15%; width:100%">
            <div style="background: red; width:50%;">
                <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_tijera.png')}}" alt="">
                        <p>Tijeras</p>
                    </div>
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_regla.png')}}" alt="">
                        <p>Regla</p>
                    </div>
                </div>
                <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_varillas.png')}}" alt="">
                        <p>2 Varillas</p>
                    </div>
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_papel.png')}}" alt="">
                        <p>Papel de seda</p>
                    </div>
                </div>
            </div>
            <div style="background: rgb(0, 174, 255); width:50%;">
                <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_pegamento.png')}}" alt="">
                        <p>Pegamento</p>
                    </div>
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_lapiz.png')}}" alt="">
                        <p>Lápiz</p>
                    </div>
                </div>
                <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_hilo.png')}}" alt="">
                        <p>Cuerda / hilo</p>
                    </div>
                    <div style="text-align: center; width: 50%">
                        <img style="width: 60%; margin:auto;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_cinta.png')}}" alt="">
                        <p>Cinta adhesiva</p>
                    </div>
                </div>
            </div>
        </div>
            <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/PASO-A-PASO.png')}}" alt="">
        <div style="display: flex; height:18%; width:100%">
            <div style="background: green; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_1.png')}}" alt="">
                <p>Coloca las varillas en cruz dejando un margen superior de 5cm en la varilla vertical y 25cm a cada lado en la varilla horizontal. Únelas bien con cuerda o cinta adhesiva.</p>
            </div>
            <div style="background: yellow; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_2.png')}}" alt="">
                <p>Ata un hilo a cada uno de los extremos de la cruz, pasándolo varias veces por cada extremo, hasta formar un rombo. Refuerza con cinta adhesiva si fuera necesario.</p>
            </div>
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: blue; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_3.png')}}" alt="">
                <p>Dibuja la forma de la cometa en el papel de seda dejando un margen de 4–5 cm y recorta la forma con ayuda de las tijeras.</p>
            </div>
            <div style="background: green; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_4.png')}}" alt="">
                <p>Pega el papel sobrante por encima de los hilos. Utiliza cinta adhesiva para reforzar la unión con las varillas en ambas caras de la cometa.</p>
            </div>
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: yellow; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_5.png')}}" alt="">
                <p>Haz pequeños agujeros en los extremos de la cometa y pasa una cuerda de 60cm por el eje vertical y una de 50cm por el horizontal.</p>
            </div>
            <div style="background: red; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_6.png')}}" alt="">
                <p>Haz un nudo para unir ambas cuerdas con la bobina de cuerda</p>
                <p>El nudo debe quedar centrado, a la altura del eje central de la cometa.</p>
            </div>
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: cyan; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_7.png')}}" alt="">
                <p>Crea una cola de aproximadamente 3m y pégala bien con pegamento al extremo inferior de la cometa.</p>
            </div>
            <div style="background: black; width:50%;">
                <img style="width: 80%; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_8.png')}}" alt="">
                <p>Termina de decorar la cometa al gusto y ya estará lista para sacarla a volar!</p>
            </div>
        </div>
    </div>
    <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/UNETE-AL-RETO.png')}}" alt="">
    <p>Comparte una foto volando tu cometa en Instagram con el hashtag #RetoSinPantallas. No te olvides de etiquetar a tu centro Natural Optics más cercano y a @naturalopticsoficial para entrar en el sorteo de un Pack de Vuelta al Cole!</p>

    <img class="d-block mx-auto logo-N col-4" src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
@include('layouts.footer')
