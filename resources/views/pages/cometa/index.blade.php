
@include('layouts.header')

<div class="" style="background-color:#f7f0e9; height:820vh;">
    <div style="height:102vh; width:100vw">
        <img src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/BANNER-COMETA-PC.png') }}">
    </div>
    <div style="background:#00cf0a;height:600vh; width:90vw; border-radius:7.5rem; margin-left:auto; margin-right:auto; display: block">
        <div style="">
            <img style="width: 40%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/MATERIALES-NECESARIOS.png')}}" alt="">
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: red; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_tijera.png')}}" alt="">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_regla.png')}}" alt="">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_varillas.png')}}" alt="">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_papel.png')}}" alt="">
            </div>
            <div style="background: rgb(0, 174, 255); width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_pegamento.png')}}" alt="">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_lapiz.png')}}" alt="">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_hilo.png')}}" alt="">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/icono-_cinta.png')}}" alt="">
            </div>
        </div>
        <div style="display: flex; height:3%; width:100%">
            <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/PASO-A-PASO.png')}}" alt="">
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: green; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_1.png')}}" alt="">
            </div>
            <div style="background: yellow; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_2.png')}}" alt="">
            </div>
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: blue; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_3.png')}}" alt="">
            </div>
            <div style="background: green; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_4.png')}}" alt="">
            </div>
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: yellow; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_5.png')}}" alt="">
            </div>
            <div style="background: red; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_6.png')}}" alt="">
            </div>
        </div>
        <div style="display: flex; height:18%; width:100%">
            <div style="background: cyan; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_7.png')}}" alt="">
            </div>
            <div style="background: black; width:50%;">
                <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/paso_8.png')}}" alt="">
            </div>
        </div>
    </div>
    <img style="width: 30%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/UNETE-AL-RETO.png')}}" alt="">

@include('layouts.footer')
