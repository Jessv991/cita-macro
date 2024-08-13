@include('layouts.header')
<div class="row w-100 cont-all vh-100 w-100 p-0 m-0">

    <div class="col-lg-8 col-12 p-0 m-0 lado-izq position-relative">
        <div class="d-flex flex-column justify-content-center align-items-lg-center align-items-start w-100">
            <div class="carrusel w-100">
                <div class="carrusel-inner w-100">
                    <img class="w-100 h-100 active" src="{{ asset($data['img']['orejas']) }}">
                    <img class="w-100 h-100" src="{{ asset($data['img']['orejas2']) }}">
                    <img class="w-100 h-100" src="{{ asset($data['img']['orejas3']) }}">
                </div>
            </div>
            <div class="w-50 mt-5 style-tarj">
                @include('test.index')
            </div>
            <div class="w-100">
                @include('map.index')
            </div>
            <div class="w-100 d-none  d-lg-block">
                @include('layouts.footer_view')
            </div>
        </div>
    </div>

    <div class="col-lg-4 h-100 p-0 m-0 lado-der d-flex justify-content-center align-items-center position-relative">
        <div class="cont-form-principal position-fixed d-flex justify-content-center align-items-center">
            @include('form.pide_cita')
        </div>

    </div>

    <div class="w-100 d-flex justify-content-center d-block  d-lg-none">
        @include('layouts.footer_view')
    </div>
</div>

@include('layouts.footer')

{{-- 
<div class="card-header">{{ __('translation.titulo-1') }}</div>
<img src="{{ __($data['logo']->f1) }}" alt=""> --}}
