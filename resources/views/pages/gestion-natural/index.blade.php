<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Gestión Natural SL</title>
    <meta name="author" content="Natural Optics">
    <link rel="icon" href="{{ asset('cita-macro/assets/iconos_landings/N_2.png') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center p-3"><img width="250px" src="{{ asset('cita-macro/assets/logos/basicos/logo_black_03.png') }}" /></div>

                <div class="col-12 text-center mb-5">{!! __('policy.Gestion-titulo') !!}</div>

                <div class="col-12 ">
                {!! __('policy.gestion-1') !!}
                {!! __('policy.gestion-2') !!}
                {!! __('policy.gestion-3') !!}
                {!! __('policy.gestion-4') !!}
                {!! __('policy.gestion-5') !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>