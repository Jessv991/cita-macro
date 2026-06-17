<footer>

    {{-- ruta del documento jQuery --}}
    @php
        $baseUrl = url('/'); //esta es la base url
        $locale = $data['idioma'];
        $landing = $data['landing'];
        $rutaAsset;
    @endphp

    @if ($baseUrl !== 'https://optica.naturalopticsgroup.com')
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
        function detectarOrientacion() {
            const esVertical = window.innerHeight > window.innerWidth;
    
            document.body.classList.toggle('mobile', esVertical);
            document.body.classList.toggle('desktop', !esVertical);
    
            document.cookie = `orientacion=${esVertical ? 'mobile' : 'desktop'}; path=/;`;
    
            if (localStorage.getItem('orientacionGuardada') !== (esVertical ? 'mobile' : 'desktop')) {
                localStorage.setItem('orientacionGuardada', esVertical ? 'mobile' : 'desktop');
                location.reload();
            }
        }
    
        window.addEventListener('load', detectarOrientacion);
        window.addEventListener('resize', detectarOrientacion);
    </script>

    <script>
        var getWebloginByGroup = '{{ route('getWeblogin') }}';
        var getStoreByWeblogin = '{{ route('getStoreByWeblogin') }}';
        var getLocalidadByProvinciaRoute = '{{ route('getLocalidadByProvincia') }}';
        var getOpticasByProvinciaRoute = '{{ route('getOpticasByProvincia') }}';
        var getOpticasByWeblogin = '{{ route('getOpticasByWeblogin') }}';
        var getOpticasByWebloginAndOptica = '{{ route('getOpticaByWebloginAndOptica') }}';
        var csrfToken = '{{ csrf_token() }}';
        var seleccionaUnaCiudadText = '{{ __('form_translation.Selecciona_una_ciudad') }}';
        var selectWeblogin = '{{ __('form_translation.weblogin') }}';
        var placeholderCode = '{{ __('form_translation.code') }}';
        var selectGroup = '{{ __('form_translation.group') }}';
        var seleccionaUnaCiudadPracticasText = '{{ __('form_translation.Selecciona_una_ciudad_practicas') }}';
        var seleccionaUnaOpticaText = '{{ __('form_translation.Selecciona_una_optica') }}';
        var seleccionaOptica1 = '{{ __('form_translation.optica') }}';
        var seleccionaOptica2 = '{{ __('form_translation.optica2') }}';
        var seleccionaOptica3 = '{{ __('form_translation.optica3') }}';
        var styleMap = '';
        var appData

        appData = {
            baseUrl: "{{ url('/') }}",
            assetUrl: "{{ asset('/') }}",
            mapa: {!! $data['mapa'] !!}
        };
    </script>

    <script src="{{ asset($rutaAsset . 'js/jQuery/form/form.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/jQuery/form/form_cooper.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/jQuery/landings/' . $landing . '.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/cookies/cookieconsent.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/cookies/Cookie_Templates/cookies-' . $locale . '.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/jQuery/map/map.js') }}"></script>
    <script src="{{ asset($rutaAsset . 'js/jQuery/test/test.js') }}"></script>
    <script>
        AOS.init();
    </script>

</footer>

</body>

</html>
