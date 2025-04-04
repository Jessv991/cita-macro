@include('layouts.header')

<div class="background-container w-100">
    <div class="background-item w-100">
        <div class="col-12 p-0 m-0 w-100" style="background-color: #E6E4DD">

            <div class="row">
                <div class="col-lg-8 col-12">
                    <img class="w-100 h-100 active" src="{{ asset($data['revision']) }}">
                </div>
    
                <div class="cont-form col-lg-4 col-12 p-0 m-0 d-flex justify-content-center align-items-center">
                    <div class="w-lg-50 w-md-100">
                        @include('form.pide_cita')
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</div>

@include('layouts.footer')
