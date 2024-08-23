@php
    $locale = $data['idioma'];
    $telefonoOptica = '681329383'; 
    $mailOptica = 'j.vasquez@naturalopticsgroup.com';
@endphp

@include('layouts.header')
<div class="row w-100 cont-all vh-100 w-100 p-0 m-0 h-100">

    <div class="col-12 p-0 m-0 lado-izq position-relative h-100">
        <div class="d-flex flex-column justify-content-center align-items-lg-center align-items-start w-100">
            <div class="carrusel w-100">
                <div class="carrusel-inner w-100">
                    <img class="w-100 h-100 active" src="{{ asset($data['img']['orejas']) }}">
                    <img class="w-100 h-100" src="{{ asset($data['img']['orejas2']) }}">
                    <img class="w-100 h-100" src="{{ asset($data['img']['orejas3']) }}">
                </div>
            </div>

            <div class="row w-100 text-center p-5">

                <div class="text-center colr-text mt-5 p-0">
                    <span class="fz-1 fw-bold lead text-uppercase">{{ __('cita_audio.titulo-1') }}</span><br>
                    <div class="text-sub">
                        <span class="lead fz-2 fw-bold lead">{{ __('cita_audio.subTitulo-1') }}</span>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 card-style mt-5 mb-5" data-aos="fade-up-left">
                    <img class="med-img-circle" src="{{ asset('assets/img/cita-audio/transito.png') }}" />
                    <div class="mt-3">
                        <span class="t-img-circle">{{ __('cita_audio.card-1-1') }}</span><br>
                        <span class="t-img-circle fw-bold">{{ __('cita_audio.card-1-2') }}</span>
                        <div class="text-center cont-text-black">
                            <span class="fz-4 fw-normal">{{ __('cita_audio.card-text-1') }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 card-style mt-5 mb-5" data-aos="fade-up-left">
                    <img class="med-img-circle" src="{{ asset('assets/img/cita-audio/revision.png') }}" />
                    <div class="mt-3">
                        @if ($locale === 'es')
                            <div class="p-titol-card3">
                                <span class="t-img-circle">{{ __('cita_audio.card-3-1') }}</span><br>
                                <span class="t-img-circle fw-bold">{{ __('cita_audio.card-3-2') }}</span>
                            </div>
                        @endif

                        @if ($locale === 'cat')
                            <div class="p-titol-card3-cat d-flex justify-content-center align-items-center">
                                <span class="fw-bold">{{ __('cita_audio.card-3-2') }}</span>
                            </div>
                        @endif

                        <div class="text-center cont-text-black">
                            <span class="fz-4 fw-normal">{{ __('cita_audio.card-text-3') }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 card-style mt-5 mb-5" data-aos="fade-up-left">
                    <img class="med-img-circle" src="{{ asset('assets/img/cita-audio/girl.png') }}" />
                    <div class="mt-3">
                        <span class="t-img-circle">{!! __('cita_audio.card-2-1') !!}</span><br>
                        <span class="t-img-circle fw-bold">{{ __('cita_audio.card-2-2') }}</span>
                        <div class="text-center cont-text-black m-text-card2">
                            <span class="fz-4 fw-normal">{{ __('cita_audio.card-text-2') }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3 card-style mt-5 mb-5" data-aos="fade-up-left">
                    <img class="med-img-circle" src="{{ asset('assets/img/cita-audio/baby.png') }}" />
                    <div class="mt-3">
                        <span class="t-img-circle">{{ __('cita_audio.card-4-1') }}</span><br>
                        <span class="t-img-circle fw-bold">{{ __('cita_audio.card-4-2') }}</span>
                        <div class="text-center cont-text-black">
                            <span class="fz-4 fw-normal">{{ __('cita_audio.card-text-4') }}</span>
                        </div>
                    </div>
                </div>

            </div>


            <div class="style-tarj w-50" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                @include('test.index')
            </div>

            <div class="d-flex flex-column justify-content-center mt-5 pt-5 mb-5 text-centre">
                <span class="fs-1 lead fw-bold text-uppercase text-center">{{ __('cita_audio.titulo-2') }}</span>
                <span class="fs-1 lead fw-bold text-uppercase text-center">{{ __('cita_audio.titulo-3') }}</span>
            </div>

            <div class="w-100">
                @include('map.index')
            </div>
            <div class="w-100 d-none  d-lg-block">
                @include('layouts.footer_view')
            </div>
        </div>

    </div>

    <div class="col-lg-4 h-100 p-0 m-0 lado-der d-flex justify-content-center align-items-center position-relative d-none">
        <div class="cont-form-principal formulario position-fixed d-flex justify-content-center align-items-center">
            <button class="btn-close">×</button>
            @include('form.pedido_opticas')
        </div>

    </div>

    <div class="w-100 d-flex justify-content-center d-block  d-lg-none">
        @include('layouts.footer_view')
    </div>
</div>

<a href="#" class="btn-flotante" id="btn-flotante"><span class="textPC">Pide cita</span><img class="bfi" src="{{ asset('assets/iconos/form/icon-form3.png') }}" alt="Icono"></a>

@include('layouts.footer')

{{-- 
col-lg-8 col-12
<div class="card-header">{{ __('translation.titulo-1') }}</div>
<img src="{{ __($data['logo']->f1) }}" alt=""> 
--}}
