</body>
<footer>
    {{-- style bootstrap --}}
    <script src="{{ asset('/cita-macro/public/js/bootstrap.bundle.min.js') }}"></script>

    {{-- variables del jQuery --}}
    <script>
        var getLocalidadByProvinciaRoute = '{{ route("getLocalidadByProvincia") }}';
        var getOpticasByProvinciaRoute = '{{ route("getOpticasByProvincia") }}';
        var csrfToken = '{{ csrf_token() }}';
        var seleccionaUnaCiudadText = '{{ __('form_translation.Selecciona_una_ciudad') }}';
        var seleccionaUnaOpticaText = '{{ __('form_translation.Selecciona_una_optica') }}';
    </script>
    {{-- ruta del documento jQuery --}}
    <script src="{{ asset('js/jQuery/' . $data['landing'] . '.js') }}"></script>
</footer>
</html>