@include('layouts.header')
<div class="row w-100">

    <div class="col-12 col-xl-8 col-lg-8 p-0">
        <h1>hola</h1>
    </div>

    <div class="col-12 col-xl-4 col-lg-4 w-20 p-0">
        @include('form.boxed')
    </div>

</div>

{{-- 
<div class="card-header">{{ __('translation.titulo-1') }}</div>
<img src="{{ __($data['logo']->f1) }}" alt=""> --}}



{{-- @include('form.boxed') --}}


@include('layouts.footer')
