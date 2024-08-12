
<div id="map"></div>


<script>
    
    const baseUrl = "{{ url('/') }}"; // Base URL de la aplicación
    
    // Definir la URL del PNG basado en la base URL
    let rutaPng;

    
    
    if (baseUrl !== 'https://www.audio.naturaloptics.com') {
        rutaPng = '{{ asset("assets/iconos/map/ubi-nat.png") }}';
    } else {
        rutaPng = '{{ asset("cita-macro/assets/iconos/map/ubi-nat.png") }}';
    } 

    mapboxgl.accessToken = 'pk.eyJ1IjoiaXZ2bGcyZHUiLCJhIjoiY2t3ZGN1Ym42MXVrbzJucW1teXpnY3h0ZyJ9.IdLdcvriRQugWA6kDWivUA';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/dariusnatural/cl0jfj0qb001s15o8ei998bv1',
        cooperativeGestures: true,
        center: [-6.668701, 36.719758],
        zoom: 4.2,
    });
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());
    const language = new MapboxLanguage();
    map.addControl(language);
    map.on('load', () => {
        map.loadImage(
            rutaPng,
            
            function(error, image) {
                if (error) throw error;
                map.addImage('custom-marker', image);

                map.addSource('places', {
                    'type': 'geojson',
                    'data': {
                        'type': 'FeatureCollection',
                        'features': {!! $data['mapa'] !!}
                    }
                });

                // Add a layer showing the places.
                map.addLayer({
                    'id': 'places',
                    'type': 'symbol',
                    'source': 'places',
                    'layout': {
                        'icon-image': 'custom-marker',
                        'icon-allow-overlap': true,
                        'icon-size': 0.6
                    }
                });



                map.addLayer({
                    'id': 'add-3d-buildings',
                    'source': 'composite',
                    'source-layer': 'building',
                    'filter': ['==', 'extrude', 'true'],
                    'type': 'fill-extrusion',
                    'minzoom': 15,
                    'paint': {
                        'fill-extrusion-color': '#D9DADA',
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'height']
                        ],
                        'fill-extrusion-base': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'min_height']
                        ],
                        'fill-extrusion-opacity': 0.3
                    }
                }, );
            }
        );
    });


    map.on('click', 'places', (e) => {
        map.flyTo({
            center: e.features[0].geometry.coordinates,
            zoom: 16,
            pitch: 40, // pitch in degrees
            bearing: 0, // bearing in degrees
        });
    });

    map.on('click', 'places', (e) => {
        const coordinates = e.features[0].geometry.coordinates.slice();
        const Nombre = e.features[0].properties.Nombre;

        const popup = new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(
                `<h4>${Nombre}</h4>`
            )
            .addTo(map);
    });


    map.on('mouseenter', 'places', () => {
        map.getCanvas().style.cursor = 'pointer';
    });
    map.on('mouseleave', 'places', () => {
        map.getCanvas().style.cursor = '';
    });

    map.on('wheel', () => {
        const currentZoom = map.getZoom();
        if (currentZoom < 15) {
            map.setPitch(0);
            $('.mapboxgl-popup').remove();
        }

    });
    
</script>