@include('layouts.header')
<div class="container-fluid">
    <div class="background-container">
        <div class="background-item">
            <div class="w-100 d-flex justify-content-center justify-content-md-end p-5 pb-0">
                <img class="logo_mung" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/logoMungia.png') }}">
            </div>
            <div class="col-12">
                <div class="row g-0">
                    <div class="col-lg-8 col-12 cont-r p-0">
                        <div class="row ms-auto ps-md-5 d-block d-md-flex">
                            <div class="col-12 textTop text-center text-sm-start mt-5 mt-md-auto ps-md-5 pad_bott">
                                <span class="text1">Seguro Visual Plan</span>
                                <br>
                                <span class="text2">PROGRESIVO</span>
                            </div>
                            <div class="col-12 col-md-6 px-5 px-md-3 ps-md-5 my-5 pb-5 d-flex flex-column">
                                <div class=" d-flex align-items-center"><img class="icon-lente" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/lentes.svg') }}"><span class="text_lent ps-2">LENTE OFTÁLMICA</span></div>
                                <div class=" d-flex flex-column pt-4">
                                    <div class=" d-flex align-items-center">
                                        <img class="icon_num" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/1.svg') }}"><span class="text_punt ps-2 pe-5">Adaptación garantizada</span>
                                    </div>
                                    <span class="resp_punt_r">Disfruta de 100% de adaptación durante los primeros 2 meses. Si no estás satisfecho, puedes cambiar tus lentes o recibir el reembolso completo.</span>
                                </div>
                                <hr class="linea">
                                <div class=" d-flex flex-column pt-3">
                                    <div class=" d-flex align-items-center">
                                        <img class="icon_num" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/2.svg') }}"><span class="text_punt ps-2 pe-5">Protección ante rayaduras o roturas</span>
                                    </div>
                                    <span class="resp_punt">100% de cobertura durante los 2 primeros años. Sin coste adicional.</span>
                                </div>
                                <hr class="linea">
                                <div class=" d-flex flex-column pt-3">
                                    <div class=" d-flex align-items-center">
                                        <img class="icon_num" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/3.svg') }}"><span class="text_punt ps-2 pe-5">Garantía por fallo de tratamiento</span>
                                    </div>
                                    <span class="resp_punt">Esta garantía recoge la normativa legal vigente.</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 px-5 px-md-3 ps-sm-auto my-5 pb-5 pb-sm-auto d-flex flex-column">
                                <div class=" d-flex align-items-center w-100"><img class="icon-gafa" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/gafas.svg') }}"><span class="text_lent ps-2">MONTURAS</span></div>
                                <div class=" d-flex flex-column pt-3 marg_t">
                                    <div class=" d-flex align-items-center">
                                        <img class="icon_num" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/1.svg') }}"><span class="text_punt ps-2 pe-5">Cobertura por defectos de fabricación</span>
                                    </div>
                                    <span class="resp_punt">Cambios bajo garantía hasta 2 años, sujetos a la valoración del fabricante.</span>
                                </div>
                                <hr class="linea">
                                <div class=" d-flex flex-column pt-3">
                                    <div class=" d-flex align-items-center">
                                        <img class="icon_num" src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/2.svg') }}"><span class="text_punt ps-2 pe-5">Sustitución de producto</span>
                                    </div>
                                    <span class="resp_punt">En caso de no disponer del modelo exacto, se realizará el cambio por otro de iguales características.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($data['tipo_dispositivo'] == 'mobile')
                    <div class="whatsapp-sticky-container">
                        <a href="https://wa.me/+34688772399?text= !Hola! me gustaría obtener información acerca de su promoción "Seguro visual plan PROGRESIVO"."
                            target="_blank" 
                            rel="noopener noreferrer" 
                            aria-label="Chat on WhatsApp">
                        <img src="{{ asset($data['rutaAsset'] . 'assets/iconos_landings/' . $data['landing'] . '/whatsapp-icon.png') }}" 
                            alt="WhatsApp">
                        </a>
                    </div>

                    @else
                        <div class="col-lg-4 col-12 mt-lg-0 mt-3 d-flex align-items-center justify-content-center">
                            <div class="whatpB text start d-flex flex-column justify-sm-content-center p-3">
                                <p class="m-1 mb-md-4 text pt-1 pr-4 text-white text-center">Si tienes cualquier consulta, ¡escríbenos a través de WhatsApp!</p>
                                <div class="d-flex justify-content-center">
                                    <a href='https://wa.me/+34688772399?text= !Hola! me gustaría obtener información acerca de su promoción "Seguro visual plan PROGRESIVO".' title="Pedir cita"
                                        class="btn-form d-flex justify-content-center align-items-center">Enviar mensaje</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
