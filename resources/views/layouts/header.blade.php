<!DOCTYPE html>
<html lang="en">

<hea  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Natural Audio</title>
    <link rel="icon" href="https://www.audio.naturaloptics.com/cita-macro/assets/iconos_landings/N_2.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.js'></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v1.0.0/mapbox-gl-language.js'></script>

    @php
        $baseUrl = url('/'); //esta es la base url
        $locale = $data['idioma'];
        $landing = $data['landing'];
        $rutaAsset;
    @endphp

    @if ($baseUrl !== 'https://www.audio.naturaloptics.com')
       {{-- si es difernte a  www.audio.naturaloptics.com --}} 

        @php
            $rutaAsset = '';
        @endphp
    @else
        @php
            $rutaAsset = 'cita-macro/';
        @endphp
    @endif
0/mapbox-gl-language.js'></script>
0/mapbox-gl-language.js'></script>

    <link rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/form/form.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/test/test.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/footer/footer.css') }}">
    <link rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/landings/' . $landing . '.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset($rutaAsset . 'css/styles/cookies/cookieconsent.css') }}">
</head>

<body>
