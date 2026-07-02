
@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8 col-12 p-0">
                    <img class="w-100 h-100 active" src="{{ asset($data['rutaAsset'] . 'assets/img/transssegre/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img.jpg') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 p-0 mt-3 d-flex align-items-center style-form">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
