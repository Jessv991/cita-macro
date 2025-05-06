
@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <img id="sorteo-lc" class="w-100 h-100 active"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/' . $data['tipo_dispositivo'] . '/'.$data['idioma'].'/sorteo.jpg') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @include('form.sorteo_viaje')
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
