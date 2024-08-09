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
            <div class="w-100 mt-5">
                @include('map.index')
            </div>
            <div class="w-100 d-none  d-lg-block">
                @include('layouts.footer_view')
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 h-100 p-0 m-0 lado-der d-flex justify-content-center align-items-center">
        <div class="cont-form-principal position-relative d-flex justify-content-center align-items-center">
            @include('form.pide_cita')
        </div>
    </div>

    <div class="w-100 d-flex justify-content-center d-block  d-lg-none">
        @include('layouts.footer_view')
    </div>
</div>

{{-- 
<div class="card-header">{{ __('translation.titulo-1') }}</div>
<img src="{{ __($data['logo']->f1) }}" alt=""> --}}

<script>
    $(document).ready(function() {
        var $imgs = $('.carrusel-inner img');
        var index = 0;
        setInterval(function() {
            // Ocultar imagen actual
            $imgs.eq(index).removeClass('active');

            // Calcular el índice de la siguiente imagen circularmente
            index = (index + 1) % $imgs.length;

            // Mostrar la siguiente imagen
            $imgs.eq(index).addClass('active');
        }, 3000); // Cambiar de imagen cada 3 segundos
    });
</script>

@include('layouts.footer')
