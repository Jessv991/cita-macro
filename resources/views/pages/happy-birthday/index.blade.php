@php
    $locale = $data['idioma'];
    $telefonoOptica = '681329383';
    $mailOptica = 'j.vasquez@naturalopticsgroup.com';
    $baseUrl = url('/');
    $rutaAsset;
@endphp

<<<<<<< HEAD
@if ($baseUrl !== 'https://optica.naturalopticsgroup.com')
=======
@if ($baseUrl !== 'https://audio.naturalopticsgroup.com')
>>>>>>> da3fa4afe5b47ead2b918400ab59c91b1916e151
    @php
        $rutaAsset = '';
    @endphp
@else
    @php
<<<<<<< HEAD
        $rutaAsset = 'cita-macro-nog/';
=======
        $rutaAsset = 'cita-macro/';
>>>>>>> da3fa4afe5b47ead2b918400ab59c91b1916e151
    @endphp
@endif

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
<<<<<<< HEAD
        <div class="col-12" style="background-color: #fde1a694">
            <div class="row">
                <div class="col-lg-8 col-12 p-0">
                    <img class="w-100 h-100 active" src="{{ asset($data['cumple']) }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 style-form">
=======
        <div class="col-12" style="background-color: #93688a">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active" src="{{ asset($data['cumple']) }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
>>>>>>> da3fa4afe5b47ead2b918400ab59c91b1916e151
                    @include('form.pide_cita')
                </div>
            </div>
        </div>
    </div>
</div>


<<<<<<< HEAD
=======
<div class="col-lg-4 h-100 p-0 m-0 lado-der d-flex justify-content-center align-items-center position-relative d-none">
    <div class="cont-form-principal position-fixed d-flex justify-content-center align-items-center">
        <button class="btn-close">×</button>
        @include('form.pide_cita')
    </div>

</div>


>>>>>>> da3fa4afe5b47ead2b918400ab59c91b1916e151
@include('layouts.footer')
