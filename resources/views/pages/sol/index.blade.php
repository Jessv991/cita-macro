@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12 p-0 m-0">
            <img class="w-100"
                src="{{ asset('assets/img/sol/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
            <div class="row p-0 m-0 mt-5">
                <div class="col-5 p-0 m-0 d-flex justify-content-center">
                    {{-- <p class="text-top-form">{{ __('sol.regalo') }}</p> --}}
                    <img class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/regalo.png') }}">
                </div>
                <div class="col-7 p-0 m-0 d-flex justify-content-center">
                    <img class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/promo.png') }}">
                </div>
            </div>

            <div class="w-100 d-flex flex-column align-items-center">
                <div class="linea mb-3"></div>
                <img class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/filtro.png') }}">
            </div>

            <div class="col-10 w-100 p-0 m-0 mt-5 d-flex justify-content-center">
                <div class="row w-100 d-flex justify-content-center mt-5">
                    <div class="col-2 p-0 m-0">
                        <div class="col-6 p-0 m-0 d-flex justify-content-center w-100">
                            <img id="orang1" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/orang1.png') }}">
                        </div>
                        <div class="col-6 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="orang2" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/orang2.png') }}">
                        </div>
                    </div>
                    <div class="col-2 p-0 m-0">
                        <div class="col-6 p-0 m-0 d-flex justify-content-center w-100">
                            <img id="yell1" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/yell1.png') }}">
                        </div>
                        <div class="col-6 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="yell2" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/yell2.png') }}">
                        </div>
                    </div>
                    <div class="col-2 p-0 m-0">
                        <div class="col-6 p-0 m-0 d-flex justify-content-center w-100">
                            <img id="red1" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/red1.png') }}">
                        </div>
                        <div class="col-6 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="red2" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/red2.png') }}">
                        </div>
                    </div>
                    <div class="col-2 p-0 m-0">
                        <div class="col-6 p-0 m-0 d-flex justify-content-center w-100">
                            <img id="green1" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/green1.png') }}">
                        </div>
                        <div class="col-6 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="green2" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/green2.png') }}">
                        </div>
                    </div>
                    <div class="col-2 p-0 m-0">
                        <div class="col-6 p-0 m-0 d-flex justify-content-center w-100">
                            <img id="blu1" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/blu1.png') }}">
                        </div>
                        <div class="col-6 p-0 m-0 d-flex justify-content-center mt-3 w-100">
                            <img id="blu2" class="w-75" src="{{ asset('assets/img/sol/desktop/' . $data['idioma'] . '/blu2.png') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 d-flex justify-content-center">
                <div class="linea"></div>
            </div>

            @include('form.pide_cita')

        </div>
    </div>
</div>

@include('layouts.footer')
