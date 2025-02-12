<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 99%;
        background-image: url("{{ asset($data['audio']) }}");
        background-size: 100%;
        background-position: center;
        background-repeat: no-repeat; 
    }
</style>


@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 col-12 p-0">
                </div>
                <div class="col-lg-6 col-12 mt-lg-0 mt-3">
                    @include('form.pide_cita')
                </div>
            </div>
        </div>    
    </div>
</div>

<script>
    function detectarOrientacion() {
        const esVertical = window.innerHeight > window.innerWidth;

        // Establecer la clase para manejar la orientación
        document.body.classList.toggle('mobile', esVertical);
        document.body.classList.toggle('desktop', !esVertical);

        // Establecer orientación en una cookie para que PHP pueda usarla
        document.cookie = `orientacion=${esVertical ? 'mobile' : 'desktop'}; path=/;`;

        // Recargar la página solo si la orientación ha cambiado
        if (localStorage.getItem('orientacionGuardada') !== (esVertical ? 'mobile' : 'desktop')) {
            localStorage.setItem('orientacionGuardada', esVertical ? 'mobile' : 'desktop');
            location.reload(); // Recarga la página
        }
    }

    // Ejecutar la detección en carga y cuando cambie la orientación
    window.addEventListener('load', detectarOrientacion);
    window.addEventListener('resize', detectarOrientacion);
</script>

@include('layouts.footer')
