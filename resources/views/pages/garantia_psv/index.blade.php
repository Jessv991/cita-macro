@include('layouts.header')

<div class="background-container">
    <div class="background-item">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-8 col-12">
                </div>
                <div class="col-lg-4 col-12 mt-lg-0 mt-3 d-flex align-items-center">
                    <div class="whatpB text start d-flex flex-column justify-sm-content-center p-3">
                        <p class="m-1 mb-md-4 text pt-1 pr-4 text-white text-center">
                            {{ __('form_translation.wsp_preferencia') }}</p>
                        <div class="d-flex justify-content-center">
                            <a href='https://wa.me/+34688772399?text= !Hola! me gustaría obtener información acerca de su promoción "Seguro visual plan PROGRESIVO".' title="Pedir cita"
                                class="btn-form d-flex justify-content-center align-items-center">{{ __('form_translation.Confirma_reserva') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
