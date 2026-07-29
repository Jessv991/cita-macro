@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row h-100">
                <div class="col-lg-8 col-12 scroll-hidden p-0">
                    <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/promo_progresivas/' . $data['tipo_dispositivo'] . '/es/img.png') }}">
                    <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/promo_progresivas/' . $data['tipo_dispositivo'] . '/es/img2.png') }}">
                    <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/promo_progresivas/' . $data['tipo_dispositivo'] . '/es/img3.png') }}">
                    <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/promo_progresivas/' . $data['tipo_dispositivo'] . '/es/img4.png') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 p-0">
                    @include('form.pide_cita_intervision')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
