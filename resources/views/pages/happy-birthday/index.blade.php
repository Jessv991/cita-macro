@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active" src="{{ asset($data['cumple']) }}">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3">
                    @include('form.sorteo_viaje')
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
