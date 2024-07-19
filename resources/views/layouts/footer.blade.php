</body>
<footer>
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
    @endphp

    @if ($baseUrl !== 'https://www.audio.naturaloptics.com'){{-- si es difernte a  www.audio.naturaloptics.com--}}
        <script src="{{ asset('js/jQuery/' . $data['landing'] . '.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @else
        <script src="{{ asset('cita-macro/js/jQuery/' . $data['landing'] . '.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('cita-macro/css/app.css') }}">
        
    @endif

</footer>

</html>
