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
    @endphp

    @if ($baseUrl !== 'https://www.audio.naturaloptics.com'){{-- si es difernte a  www.audio.naturaloptics.com--}}
        <script src="{{ asset('js/jQuery/form/form.js') }}"></script>
        <script src="{{ asset('js/jQuery/'.$landing.'/'.$landing.'.js') }}"></script>
        <script src="{{ asset('js/cookies/cookieconsent.js') }}"></script>
        <script src="{{ asset('js/cookies/Cookie_Templates/cookies-'.$locale.'.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/styles/form/form.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles/footer/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles/'.$landing.'/'.$landing.'.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/styles/cookies/cookieconsent.css') }}">
    @else
        <script src="{{ asset('cita-macro/js/jQuery/form/form.js') }}"></script>
        <script src="{{ asset('cita-macro/js/jQuery/'.$landing.'/'.$landing.'.js') }}"></script>
        <script src="{{ asset('cita-macro/js/cookies/cookieconsent.js') }}"></script>
        <script src="{{ asset('cita-macro/js/cookies/Cookie_Templates/cookies-'.$locale.'.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('cita-macro/css/styles/form/form.css') }}">
        <link rel="stylesheet" href="{{ asset('cita-macro/css/styles/footer/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('cita-macro/css/styles/'.$landing.'/'.$landing.'.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('cita-macro/css/styles/cookies/cookieconsent.css') }}">
        
    @endif

</footer>

</body>

</html>
