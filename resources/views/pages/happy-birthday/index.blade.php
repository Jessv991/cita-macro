@php
    $locale = $data['idioma'];
    $telefonoOptica = '681329383';
    $mailOptica = 'j.vasquez@naturalopticsgroup.com';
    $baseUrl = url('/');
    $rutaAsset;
@endphp

@if ($baseUrl !== 'https://audio.naturalopticsgroup.com')
    @php
        $rutaAsset = '';
    @endphp
@else
    @php
        $rutaAsset = 'cita-macro/';
    @endphp
@endif

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #93688a">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active" src="{{ asset($data['cumple']) }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-4 h-100 p-0 m-0 lado-der d-flex justify-content-center align-items-center position-relative d-none">
    <div class="cont-form-principal position-fixed d-flex justify-content-center align-items-center">
        <button class="btn-close">×</button>
        @include('form.pide_cita')
    </div>

</div>


@include('layouts.footer')
