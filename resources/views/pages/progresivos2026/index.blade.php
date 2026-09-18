@include('layouts.header')

<div class="background-container">
    @if ($data['tipo_dispositivo'] == 'mobile')
        <div class="background-item">
        @else
            <div class="background-item mb-5-wrapper">
    @endif
    @if ($data['tipo_dispositivo'] == 'mobile')
        <div class="banner-logo text-center">
            <img class="d-block mx-auto logo p-3"
                src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/logo_natural.png') }}">
        </div>
    @else
        <div class="banner-logo d-flex justify-content-between align-items-center btn-wrapper-fixed">
            <div class="img-logo ms-5">
                <img class="logo"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/logo_natural.png') }}"
                    alt="Logo">
            </div>
            <div class="btn-position">
                <button id="btn-flotante" class="btn btn-color-cita">{{ __('form_translation.Pedir_cita') }}</button>
            </div>
        </div>
    @endif
</div>
<div class="banner-pide-cita">
    @if ($data['tipo_dispositivo'] != 'mobile')
        <img class="d-block mx-auto w-100 h-75"
            src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
    @else
        <img class="d-block mx-auto w-100 h-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner.png') }}">
    @endif
</div>
<div class="w-100 d-lg-flex flex-column align-items-center text-center">
    <div class="w-100">
        <img class="w-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo1.png') }}">
    </div>
    <div class="text_title">
        <p><span class="fw-light">{{ __('progresivos2026.parrafo-1') }}<br>{{ __('progresivos2026.parrafo-1.1') }}</span><span class="fw-bold">{{ __('progresivos2026.parrafo-1.2') }}</span></p>
    </div>
</div>
<div class="text-center">
    @if ($data['tipo_dispositivo'] != 'mobile')
        <div class="row ps-5 pe-5 mt-5 mb-5">
            <div class="col-6 justify-content-center align-items-center d-flex">
                <img class="d-block mx-auto w-auto"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner_gif.png') }}">
            </div>
            <div class="col-6 pt-4 justify-content-center align-items-center d-flex">
                <img class="d-block img_gif"
                    src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/gafas.gif') }}">
            </div>
        </div>
    @else
        <img class="d-block mx-auto w-100 h-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/tu_vista.png') }}">
        <span class="text-dark text-center d-block mb-3 fs-5 ps-5 pe-5">{!! __('vuelta-a-la-rutina.nuevos-horarios') !!}</span>
        <img class="d-block w-100 mb-4"
            src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/empieza.png') }}">
    @endif
</div>
<div>
    <img class="d-block w-100"
        src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/banner2.png') }}">
</div>

<div class="w-100 d-lg-flex flex-column align-items-center text-center">
    <div class="w-100">
        <img class="w-100"
            src="{{ asset($data['rutaAsset'] . 'assets/img/progresivos2026/' . $data['tipo_dispositivo'] . '/' . $data['idioma'] . '/titulo2.png') }}">
    </div>
</div>

<div class="h-100">
    <div class="form-section">
        @include('form.pide_cita')
    </div>
</div>
@if ($data['tipo_dispositivo'] == 'mobile')
    <div class="fixed-bottom-container justify-content-center align-items-center"
        onclick="document.getElementById('formMacroContactologia').scrollIntoView({ behavior: 'smooth' });">
        <button class="btn-bottom-center">{{ __('form_translation.Pedir_cita') }}</button>
    </div>
@endif

<footer class="w-100">
    @if ($data['tipo_dispositivo'] != 'mobile')
        <div class="d-flex footer-contact text-center col-12">
            <a href="{{ route('politicas.privacidad', app()->getLocale()) }}"
                class="p-privacity col-4">{{ __('contactologia.Politicas-privacidad') }}</a>
            <img class="d-block mx-auto logo-N col-4"
                src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
            <a href="{{ route('politicas.cookies', app()->getLocale()) }}"
                class="p-cookies col-4">{{ __('contactologia.Politicas-cookies') }}</a>
        </div>
    @else
        <div class="d-flex flex-column align-items-center footer-contact text-center m-footer">
            <img class="d-block mx-auto logo-N mt-5"
                src="{{ asset($data['rutaAsset'] . 'assets/img/contactologia/logo-N.png') }}" alt="Logo footer">
            <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" class="p-privacity mt-2">
                {{ __('contactologia.Politicas-privacidad') }}
            </a>
            <a href="{{ route('politicas.cookies', app()->getLocale()) }}" class="p-cookies mt-1">
                {{ __('contactologia.Politicas-cookies') }}
            </a>
        </div>
    @endif
</footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function scrollToForm() {
        const form = document.getElementById("formMacroContactologia");
        form.scrollIntoView({
            behavior: "smooth"
        });
    }

    $('#btn-flotante').on('click', function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('#formMacroContactologia').offset().top
        }, 300);
    });
</script>
@include('layouts.footer')
