@php
    $locale = $data['idioma'];
    $telefonoOptica = '681329383';
    $mailOptica = 'j.vasquez@naturalopticsgroup.com';
    $baseUrl = url('/');
    $rutaAsset;
@endphp

@if ($baseUrl !== 'https://optica.naturalopticsgroup.com')
    @php
        $rutaAsset = '';
    @endphp
@else
    @php
        $rutaAsset = 'cita-macro-nog/';
    @endphp
@endif

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #fde1a694">
            <div class="row">
                <div class="col-lg-8 col-12 p-0">
                    {{-- <img class="w-100 h-100 active" src="{{ asset($data['cumple']) }}"> --}}
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 style-form">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
