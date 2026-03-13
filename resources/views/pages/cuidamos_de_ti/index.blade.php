@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="col-12" style="background-color: #1b5b4b, height: 100vh;">
    <div class="row">
        <div class="col-lg-8 col-12">
            <img class="w-100 h-100 active"
                src="{{ asset($data['rutaAsset'] . 'assets/img/cuidamos_de_ti/' . $data['tipo_dispositivo'] . '/es/img.png') }}">
        </div>
        <div class="col-lg-4 col-12 mt-lg-0 mt-3">
            @include('form.pide_cita_intervision')
        </div>
    </div>
</div>


@include('layouts.footer')
