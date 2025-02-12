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


@include('layouts.footer')
