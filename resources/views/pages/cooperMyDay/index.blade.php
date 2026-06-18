
@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #276064">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active" src="{{ asset($data['rutaAsset'] . 'assets/img/intervision_expert_lentillas/' . $data['tipo_dispositivo'] . '/es/img.png') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @include('form.cooperMyDay')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
