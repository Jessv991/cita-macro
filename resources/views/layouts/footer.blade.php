<footer class="esto">
    {{-- style bootstrap --}}
    <script src="{{ asset('/cita-macro/public/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    {{-- animación aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- inicializamos aos --}}
    <script>
        AOS.init();
    </script>

    {{-- variables del jQuery --}}
    <script>
        var getLocalidadByProvinciaRoute = '{{ route('getLocalidadByProvincia') }}';
        var getOpticasByProvinciaRoute = '{{ route('getOpticasByProvincia') }}';
        var getOpticasByWeblogin = '{{ route('getOpticasByWeblogin') }}';
        var getOpticasByWebloginAndOptica = '{{ route('getOpticaByWebloginAndOptica') }}';
        var csrfToken = '{{ csrf_token() }}';
        var seleccionaUnaCiudadText = '{{ __('form_translation.Selecciona_una_ciudad') }}';
        var seleccionaUnaOpticaText = '{{ __('form_translation.Selecciona_una_optica') }}';
    </script>

    {{-- ruta del documento jQuery --}}
    @php
        $baseUrl = url('/'); //esta es la base url
        $locale = $data['idioma'];
        $landing = $data['landing'];
        $rutaAsset;
    @endphp

    @if ($baseUrl !== 'https://www.audio.naturaloptics.com')
        {{-- si es difernte a  www.audio.naturaloptics.com --}}

        @php
            $rutaAsset = '';
        @endphp
    @else
        @php
            $rutaAsset = 'cita-macro/';
        @endphp
    @endif

    <script src="{{ asset($rutaAsset.'js/jQuery/form/form.js') }}"></script>
    {{-- <script src="{{ asset('js/jQuery/'.$landing.'/'.$landing.'.js') }}"></script> --}}
    <script src="{{ asset($rutaAsset.'js/cookies/cookieconsent.js') }}"></script>
    <script src="{{ asset($rutaAsset.'js/cookies/Cookie_Templates/cookies-' . $locale . '.js') }}"></script>
    <link rel="stylesheet" href="{{ asset($rutaAsset.'css/styles/form/form.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset.'css/styles/footer/footer.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset.'css/styles/' . $landing . '/' . $landing . '.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset.'css/styles/Mapbox/map.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset($rutaAsset.'css/styles/cookies/cookieconsent.css') }}">

</footer>

</body>

</html>
