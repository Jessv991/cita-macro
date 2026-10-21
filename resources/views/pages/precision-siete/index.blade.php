@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8 col-12 d-flex justify-content-center align-items-center p-0">
                    <img class="w-100 h-100 active"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/precision-siete/' . $data['tipo_dispositivo'] . '/es/img.png') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 d-flex justify-content-center align-items-center p-0">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    document.getElementById('video2').addEventListener('touchmove', function(e) {
        // Permite el gesto de scroll peroprevent zoom
        if (e.touches.length > 1) {
            e.preventDefault();
        }
    }, {
        passive: false
    });
</script>
