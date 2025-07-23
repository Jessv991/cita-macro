
@include('layouts.header')

<div class="" style="background-color:#f7f0e9; height:420vh;">
    <div style="height:102vh; width:100vw">
        <img src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/BANNER-COMETA-PC.png') }}">
    </div>
    <div style="background:#fbf7f3;height:300vh; width:90vw; border-radius:7.5rem; margin-left:auto; margin-right:auto">
        <div style="">
            <img style="width: 50%; margin:auto; display:block;" src="{{ asset($data['rutaAsset'] . '/assets/img/cometa/desktop/es/MATERIALES-NECESARIOS.png')}}" alt="">
        </div>
        <div style="background: red; height:50%; width:50%;">
        </div>
    </div>
</div>

@include('layouts.footer')
