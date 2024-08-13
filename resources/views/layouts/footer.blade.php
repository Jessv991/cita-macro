<footer class="esto">

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

    <script>
        var getLocalidadByProvinciaRoute = '{{ route('getLocalidadByProvincia') }}';
        var getOpticasByProvinciaRoute = '{{ route('getOpticasByProvincia') }}';
        var getOpticasByWeblogin = '{{ route('getOpticasByWeblogin') }}';
        var getOpticasByWebloginAndOptica = '{{ route('getOpticaByWebloginAndOptica') }}';
        var csrfToken = '{{ csrf_token() }}';
        var seleccionaUnaCiudadText = '{{ __('form_translation.Selecciona_una_ciudad') }}';
        var seleccionaUnaOpticaText = '{{ __('form_translation.Selecciona_una_optica') }}';
        var styleMap = '';
        var appData

        appData = {
            baseUrl: "{{ url('/') }}",
            assetUrl: "{{ asset('/') }}",
            mapa: {!! $data['mapa'] !!}
        };
    </script>

    <script src="{{ asset($rutaAsset . 'js/jQuery/form/form.js') }}"></script>
    /*ruta jQuery según la landing NOTA: debe quedarse en esta posición para en caso de darle 
    valor a la variable styleMapLanding en tu js llegue al jsmap con el valor ya colocado */
    <script src="{{ asset($rutaAsset . 'js/jQuery/' . $landing . '/' . $landing . '.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/cookies/cookieconsent.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/cookies/Cookie_Templates/cookies-' . $locale . '.js') }}"></script>
    <link rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/form/form.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/footer/footer.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/' . $landing . '/' . $landing . '.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/cookies/cookieconsent.css') }}">
    <script src="{{ asset($rutaAsset . 'js/map/map.js') }}"></script>

    //animación aos
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    // inicializamos aos
    <script>
        AOS.init();
    </script>

</footer>

</body>

</html>
