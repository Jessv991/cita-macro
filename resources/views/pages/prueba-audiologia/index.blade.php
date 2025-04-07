<style>
    .eso {
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 99%;
        background-image: url("{{ asset($data['rutaAsset'] . 'assets/img/prueba-audiologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img.jpg') }}");
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat; 
    }
</style>


@include('layouts.header')

<div class="background-container w-100 h-100 eso">
    <div class="background-item w-100 h-100">
        <div class="col-12">
            <div class="row w-100 h-100">
                <div class="col-lg-6 col-12 p-0">
                </div>
                <div class="col-lg-6 col-12 mt-lg-0 mt-3">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>    
    </div>
</div>

@include('layouts.footer')
