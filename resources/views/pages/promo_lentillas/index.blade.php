@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #282828">
            <div class="row h-100">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/intervision_expert_lentillas/' . $data['tipo_dispositivo'] . '/es/img_' . $data['weblogin'] . '.png') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @if ($data['weblogin'] === 'luyando')
                        @include('form.pide_cita')
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
