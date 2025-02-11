<<<<<<< HEAD
=======
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
>>>>>>> da3fa4afe5b47ead2b918400ab59c91b1916e151

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
<<<<<<< HEAD
        <div class="col-12" style="background-color: #E6E4DD">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active" src="{{ asset($data['revision']) }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 style-form">
=======
        <div class="col-12" style="background-color: #50595D">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active" src="{{ asset($data['audio']) }}">
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
@include('layouts.footer')
=======
@include('layouts.footer')
>>>>>>> da3fa4afe5b47ead2b918400ab59c91b1916e151
