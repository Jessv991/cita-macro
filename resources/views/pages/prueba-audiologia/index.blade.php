@include('layouts.header')

<div class="background-container w-100 h-100">
    <div class="background-item w-100 h-100">
        <div class="col-12 p-0 d-flex justify-content-center align-items-center">
            <div class="row w-100 h-100">
                <div class="col-lg-5 col-12 p-0">
                    <img  class="w-100 h-100" src="{{ asset($data['rutaAsset'] . 'assets/img/prueba-audiologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/img.jpg') }}">
                </div>
                <div class="col-lg-7 col-12 p-0 lad-izq d-flex flex-column justify-content-center align-items-center">
                    <img class="img-form mt-5" src="{{ asset($data['rutaAsset'] . 'assets/img/prueba-audiologia/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/text.png') }}">
                    @include('form.pide_cita')
                </div>                
            </div>
        </div>    
    </div>
</div>

@include('layouts.footer')
