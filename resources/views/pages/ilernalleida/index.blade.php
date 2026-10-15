@php
    $logoOptica = $data['logoOptica'];
@endphp

@include('layouts.header')

{{-- Modal inicial --}}
<div class="modal fade" id="landingModal" tabindex="-1" aria-labelledby="landingModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="landingModalLabel">
                    Prova la teva sort!
                </h5>
            </div>

            <div class="modal-body p-4">
                <p class="text-muted mb-4">
                    Deixa'ns les teves dades per a continuar.
                </p>

                <form id="landingForm" method="POST" action="">
                    @csrf

                    <div class="nombre_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                        data-aos-offset="500" data-aos-duration="500">

                        <input class="form-control @error('nombre1') is-invalid @enderror" type="text" name="nombre1"
                            id="nombre1" placeholder='{{ __('form_translation.Nombre') }}'>
                    </div>

                    <div class="apellidos_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                        data-aos-offset="500" data-aos-duration="500">

                        <input class="form-control @error('apellidos1') is-invalid @enderror" type="text"
                            name="apellidos1" id="apellidos1" placeholder='{{ __('form_translation.Apellidos') }}'>
                    </div>

                    <div class="email_div mt-2" data-aos="fade-left" data-aos-anchor="#example-anchor"
                        data-aos-offset="500" data-aos-duration="700">

                        <input class="form-control @error('email1') is-invalid @enderror" type="text" name="email1"
                            id="email1" placeholder='{{ __('form_translation.Email_practicas') }}'>
                    </div>

                    <button type="submit" class="btn btn-color w-100 mt-3">
                        Continuar
                    </button>
                </form>

                <div id="divAgain" class="text-center d-none">
                    <h5 class="modal-title fw-bold">
                        Aquest email ja ha participat, prova amb un altre!
                    </h5>
                    <button id="again" class="btn btn-color w-100 mt-3">
                        Tornar a intentar
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="landingModal2" tabindex="-1" aria-labelledby="landingModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-body p-4">
                @include('form.ilernalleida')
            </div>

        </div>
    </div>
</div>

@include('layouts.footer')

{{-- Apertura automática del modal --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalElement = document.getElementById('landingModal');
        const form = document.getElementById('landingForm');
        const divAgain = document.getElementById('divAgain');

        if (modalElement && window.bootstrap) {
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const nombre = document.getElementById('nombre1').value.trim();
            const apellidos = document.getElementById('apellidos1').value.trim();
            const email = document.getElementById('email1').value.trim();

            $.ajax({
                url: '{{ route('validarEmailRulet') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    nombre1: nombre,
                    apellidos1: apellidos,
                    email1: email
                },
                success: function(response) {
                    console.log(response);
                    if (response.ok == false) {
                        // Cerrar el modal inicial
                        const modalInstance = bootstrap.Modal.getInstance(modalElement);

                        if (modalInstance) {
                            modalInstance.hide();
                        }

                        // Rellenar el segundo formulario
                        document.getElementById('nombre').value =
                            response.data.nombre1;

                        document.getElementById('apellidos').value =
                            response.data.apellidos1;

                        document.getElementById('email').value =
                            response.data.email1;

                        // Aquí habilitaremos la ruleta.
                        window.ruletaHabilitada = true;
                    } else {

                        form.classList.add('d-none');
                        divAgain.classList.remove('d-none');
                    }
                },
                error: function(xhr) {
                    // Limpiar errores anteriores
                    $('.invalid-feedback').text('');
                    $('#landingForm .form-control').removeClass('is-invalid');

                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        const errores = xhr.responseJSON.errors;

                        Object.keys(errores).forEach(function(campo) {
                            const input = $('#' + campo);
                            const contenedorError = $('#error-' + campo);

                            input.addClass('is-invalid');
                            contenedorError.text(errores[campo][0]);
                        });

                        return;
                    }

                    // Para errores que no sean de validación
                    alert('Se ha producido un error. Inténtalo de nuevo.');
                }
            });
        });

        const buttonAgain = document.getElementById('again');

        buttonAgain.addEventListener('click', function(event) {
            const nombre = document.getElementById('nombre1');
            const apellidos = document.getElementById('apellidos1');
            const email = document.getElementById('email1');

            nombre.value = '';
            nombre.classList.remove('is-invalid');

            apellidos.value = '';
            apellidos.classList.remove('is-invalid');

            email.value = '';
            email.classList.remove('is-invalid');

            form.classList.remove('d-none');
            divAgain.classList.add('d-none');
        });
    });
</script>
