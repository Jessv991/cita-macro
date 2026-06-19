var dispositivo = window.screen.width;
var grupoNOG = [
    'Arturo José Estevez Echevarría',
    'Daniel Martinez de Mandojana González',
    'Juan Bautista Gilabert Roca',
    'Lorena Salgado González',
    'Luz Sanchez Barbero',
    'Miguel Peñarrubia Navarro',
    'Francisco José Gómez Folgar'
];

var grupoCooper = [
    'Borja Sanchez Bernuy',
    'Blanca Galilea',
    'Vanesa Zabala',
    'Ana Catarina Sousa',
    'Alba Cernadas',
    'Marcos Vazquez',
    'David Alvarez',
    'Paco Janer',
    'Marina Gomez',
    'Alicia Baizan',
    'Salvador Diaz',
    'Yriana fernandez',
    'Isabel garcia',
    'Lola Gonzalez',
    'Maria Cabezas',
    'Josep Piquer Aybar',
    'Victor de Aviles',
    'Patricia Huerto',
    'Jorge Navarro',
    'Anton Rodilla',
    'Irina Paiva',
    'Araceli Fermosell',
    'Sara Astarloa',
];

$(document).ready(function () {

    $('input[name="tipo_comercial"]').on('change', function () {

        let GroupComer = $(this).val();
        let $comercial = $('#comercial');

        $comercial.empty();

        let grupo = GroupComer === 'comercial_nog'
            ? grupoNOG
            : grupoCooper;

        $comercial.append('<option value="">' + selectComercial + '</option>');

        grupo.forEach(function (nombre) {
            $comercial.append(
                '<option value="' + nombre + '">' + nombre + '</option>'
            );
        });

    });

    // Carga inicial según el radio marcado
    $('input[name="tipo_comercial"]:checked').trigger('change');

    //animación del icono de mapa
    $('#group').on('change', function () {
        $('#stores_container').empty();
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
                                    <p class="m-0 text-dark">
                                        Tienda ${value.tienda} - ${value.d29}
                                    </p>
                                </div>

                                <div class="col-5">
                                    <input class="form-control code-optica @error('code_optica') is-invalid @enderror"
                                        type="text"
                                        name="code_optica[${value.tienda}]"
                                        id="code_optica_${value.tienda}"
                                        value="430"
                                        maxlength="9"
                                        placeholder="${placeholderCode}">
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

    $(document).on('input', '.code-optica', function () {

        let valor = $(this).val().replace(/\D/g, '');

        // Forzar prefijo SIEMPRE
        if (!valor.startsWith('430')) {
            valor = '430' + valor.replace(/^430/, '');
        }

        $(this).val(valor.substring(0, 9));
    });

    $(document).on('focus', '.code-optica', function () {

        if (!$(this).val().startsWith('430')) {
            $(this).val('430');
        }

        setTimeout(() => {
            this.setSelectionRange(3, 3);
        }, 0);
    });

    $(document).on('keydown', '.code-optica', function (e) {

        let cursorPos = this.selectionStart;

        // Bloquear borrar dentro del prefijo 430
        if (
            (e.key === 'Backspace' && cursorPos <= 3) ||
            (e.key === 'Delete' && cursorPos < 3)
        ) {
            e.preventDefault();
        }
    });


});


