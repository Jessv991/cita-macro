
@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #276064">
            <div class="row">
                <div class="col-lg-8 col-12">
                    {{-- <img class="w-100 h-100 active" src="{{ asset($data['revision']) }}"> --}}
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @include('form.pide_cita')

                    @if ($logoOptica)
                        <div class="w-25">
                            <img class="logo-optica-data w-100" src="{{ __($data['logoOptica']) }}" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
