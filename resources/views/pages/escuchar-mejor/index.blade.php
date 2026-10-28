
@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8 col-12 p-0">
                    <img class="w-100"
                src="{{ asset($data['rutaAsset'] . 'assets/img/escuchar-mejor/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img.jpg') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 style-form">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
