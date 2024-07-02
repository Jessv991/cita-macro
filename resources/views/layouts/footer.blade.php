</body>
<footer>
    {{-- style bootstrap --}}
    <script src="{{ asset('/cita-macro/public/js/bootstrap.bundle.min.js') }}"></script>

    {{-- variables del jQuery --}}
    <script>
        var getLocalidadByProvinciaRoute = '{{ route('getLocalidadByProvincia') }}';
        var getOpticasByProvinciaRoute = '{{ route('getOpticasByProvincia') }}';
        var getOpticasByWeblogin = '{{ route('getOpticas') }}';
        var getOpticasByWebloginAndOptica = '{{ route('getOptica') }}';
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
    @else
        <script src="{{ asset('cita-macro/js/jQuery/' . $data['landing'] . '.js') }}"></script>
        
    @endif


</footer>

</html>
