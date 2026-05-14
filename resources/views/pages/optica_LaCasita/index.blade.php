@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8 col-12 d-flex justify-content-center align-items-center p-0">
                    <video autoplay muted playsinline loop id="video2">
                        <source
                            src="{{ asset($data['rutaAsset'] . 'assets/img/optica_LaCasita/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/video.mp4') }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 d-flex justify-content-center align-items-center p-0">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
