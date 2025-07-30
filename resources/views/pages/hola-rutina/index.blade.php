@include('layouts.header')

<div class="background-container">
    <div class="background-item">

        <div class="w-100">
            <img class="w-100" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.gif') }}">
        </div>

        <div class="w-100 d-flex flex-column align-items-center text-center mt-5">
            <h1 class="titol-hola-rutina">{{ __('hola_rutina.titol-1') }}<span class="Darkline-text">{{ __('hola_rutina.titol-1.2') }}</span>{{ __('hola_rutina.titol-1.3') }}</h1>
            <div class="w-75 p-5 primeros-parrafos">
                <p>{{ __('hola_rutina.parrafo-1') }} <span class="fw-bold">{{ __('hola_rutina.parrafo-1.1') }}</span></p>
                <p class="mt-4"><span class="fw-bold">{{ __('hola_rutina.parrafo-2') }}</span>{{ __('hola_rutina.parrafo-2.1') }}</p>
            </div>
        </div>


        <div class="w-100 d-flex justify-content-center cont-level-2 p-5">
            <div class="w-50 d-flex flex-column align-items-center mt-5 p-5 text-white">
                <div class="w-100">
                    <h2 class="titol-fatiga">{{ __('hola_rutina.titol-2') }}<span class="Darkline-text">{{ __('hola_rutina.titol-2.2') }}</span></h2>
                    <p class="segundo-parrafo">{{ __('hola_rutina.parrafo-3') }}</p>
                </div>
                <div class="w-100 tercer-parrafo pe-5">
                    <p>{{ __('hola_rutina.parrafo-3.1') }}</p>
                </div>
            </div>
            <div class="w-25 d-flex justify-content-center align-items-center p-5">
                <img class="gif-two" src="{{ asset($data['rutaAsset'] . 'assets/img/hola-rutina/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/fatiga.gif') }}">
            </div>

        </div>

        <div class="w-100 d-flex justify-content-center p-5">
            <h2 class="titol-fatiga">{{ __('hola_rutina.titol-3') }}<span class="Darkline-text">{{ __('hola_rutina.titol-3.2') }}</span>{{ __('hola_rutina.titol-3.3') }}</h2>
        </div>  

    </div>
</div>
@include('form.pide_cita')

@include('layouts.footer')
