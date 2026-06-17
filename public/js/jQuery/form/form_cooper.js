var dispositivo = window.screen.width;

$(document).ready(function () {

    //animación del icono de mapa
    $('#group').on('change', function () {
        var grupoId = $(this).val();

        if (grupoId) {
            $.ajax({
                url: getWebloginByGroup, // Ruta definida en el archivo Blade
                type: 'POST',
                data: {
                    grupo: grupoId,
                    _token: csrfToken // Token CSRF definido en el archivo Blade llamado foorte
                },
                success: function (data) {

                    $('#weblogin').empty();

                    $('#weblogin').append('<option value="">' + selectWeblogin + '</option>');
                    $.each(data, function (key, value) {
                        $('#weblogin').append('<option value="' + value.weblogin + '">' + value.d29 + ' - ★' + value.weblogin.toUpperCase() + '</option>');
                    });
                    $('#weblogin').val('');

                }
            });
        } else {
            $('#weblogin').empty();
            $('#weblogin').append('<option value="">' + selectWeblogin + '</option>');
        }

    });

    $('#weblogin').on('change', function () {
        var weblogin = $(this).val();

        if (weblogin) {
            $.ajax({
                url: getStoreByWeblogin,
                type: 'POST',
                data: {
                    weblogin: weblogin,
                    _token: csrfToken
                },
                success: function (data) {

                    $('#stores_container').empty();

                    $.each(data, function (key, value) {

                        let card = `
                        <div class="optica_div mt-2"
                            data-aos="fade-left"
                            data-aos-anchor="#example-anchor"
                            data-aos-offset="500"
                            data-aos-duration="1100">

                            <div class="row">
                                <div class="col-7 align-self-end">
                                    <p class="m-0 text-white">
                                        Tienda ${value.tienda} - ${value.d29}
                                    </p>
                                </div>

                                <div class="col-5">
                                    <input class="form-control @error('code_optica') is-invalid @enderror"
                                        type="text"
                                        name="code_optica[${value.tienda}]"
                                        id="code_optica_${value.tienda}"
                                        placeholder="` + placeholderCode + `">
                                </div>
                            </div>

                        </div>
                    `;

                        $('#stores_container').append(card);
                    });
                }
            });
        } else {
            $('#stores_container').empty();
        }
    });


});


