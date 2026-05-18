@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12" style="background-color: #282828">
            <div class="row h-100">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active"
                        src="{{ asset($data['rutaAsset'] . 'assets/img/intervision_expert_lentillas/' . $data['tipo_dispositivo'] . '/es/img_' . $data['weblogin'] . '.png') }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @if ($data['weblogin'] === 'reguren')
                        <div class="whatpB text start d-flex flex-column justify-sm-content-center p-3">
                            <p class="m-1 mb-md-4 text pt-1 pr-4 text-whiter">
                                {{ __('form_translation.wsp_preferencia') }}</p>
                            <a href="https://wa.me/+34613397109" title="Pedir cita"
                                class="btn-form">{{ __('form_translation.wsp_chat') }}</a>
                        </div>
                    @else
                        @include('form.pide_cita')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
