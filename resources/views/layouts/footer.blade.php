<footer>

    {{-- ruta del documento jQuery --}}
    @php
        $locale = $data['idioma'];
        $landing = $data['landing'];
    @endphp

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

    <script src="{{ asset('js/jQuery/form/form.js') }}"></script>
    <script src="{{ asset('js/jQuery/landings/' . $landing . '.js') }}"></script>
    <script src="{{ asset('js/cookies/cookieconsent.js') }}"></script>
    <script src="{{ asset('js/cookies/Cookie_Templates/cookies-' . $locale . '.js') }}"></script>
    <script src="{{ asset('js/jQuery/map/map.js') }}"></script>
    <script src="{{ asset('js/jQuery/test/test.js') }}"></script>
    <script>
        AOS.init();
    </script>

</footer>

</body>

</html>
