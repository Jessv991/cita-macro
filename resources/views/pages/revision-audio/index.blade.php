@include('layouts.header')
<div class="row w-100">

    <div class="col-12 col-xl-8 col-lg-8 p-0 m-0">
        <div class="d-flex justify-content-center align-items-center mt-5 mb-5 w-100 p-0">
            <div class="carrusel w-100">
                <div class="carrusel-inner">
                    <img class="w-100 h-100 active" src="{{ asset($data['img']['orejas']) }}">
                    <img class="w-100 h-100" src="{{ asset($data['img']['orejas2']) }}">
                    <img class="w-100 h-100" src="{{ asset($data['img']['orejas3']) }}">
                </div>
            </div>
        </div> 
    </div>

    <div class="col-12 col-xl-4 col-lg-4 w-20 p-0 m-0">
        @include('form.pide_cita')
    </div>

</div>

{{-- 
<div class="card-header">{{ __('translation.titulo-1') }}</div>
<img src="{{ __($data['logo']->f1) }}" alt=""> --}}



{{-- @include('form.boxed') --}}


@include('layouts.footer')
