
@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #1b5b4b">
            <div class="row h-100">
                <div class="col-lg-8 col-12">
                    @if($data['weblogin'] === 'expertgrupotorrevieja')
                        <img class="w-100 h-100 active" src="{{ asset($data['rutaAsset'] . 'assets/img/intervision_expert_two_for_one/' . $data['tipo_dispositivo'] . '/es/img.png') }}">
                    @else
                        <img class="w-100 h-100 active" src="{{ asset($data['rutaAsset'] . 'assets/img/intervision_expert_two_for_one/' . $data['tipo_dispositivo'] . '/es/sorteo.png') }}">
                    @endif
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @include('form.pide_cita_intervision')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
