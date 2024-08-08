<div class="cuerpo">
    <div class="redes">
        <div class="line-top"></div>
        <img class="img-t med-img svg-color" src="{{ asset('assets/iconos/redes_sociales/twitter-footer.svg') }}" alt="">
        <img class="img-f med-img svg-color" src="{{ asset('assets/iconos/redes_sociales/facebook-footer.svg') }}" alt="">
        <img class="img-i med-img svg-color" src="{{ asset('assets/iconos/redes_sociales/instagram-footer.svg') }}" alt="">
        <img class="img-b svg-color" src="{{ asset('assets/iconos/blog/negro.svg') }}" alt="">
        <div class="line-bottom"></div>
    </div>
    

    <div class="d-flex justify-content-lg-start justify-content-center">
        <img class="logo-natural-optic" src="{{ asset('assets/logos/basicos/audio_white.png') }}" alt="">
    </div>

    <div class="cuerpo-poli">
        <label class="content-poli" for="reverseCheck1">
            <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" target="_blank"
                style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                {{ __('form_translation.Aceptar_politicas_privacidad_2') }}
            </a>
            <div class="line-center"></div>
            <a href="{{ route('politicas.privacidad', app()->getLocale()) }}" target="_blank"
                style="margin-left: 5px; text-decoration: underline; cursor: pointer;">
                {{ __('form_translation.Aceptar_politicas_privacidad_2') }}
            </a>
        </label>
    </div>

</div>