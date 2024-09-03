'use strict';

{
    // have to fix for token to be read from .env
    mapboxgl.accessToken = 'pk.eyJ1IjoibmFiZXlhc3UiLCJhIjoiY20waG1tdDJnMGMxaDJrc2x6anZzNWl3ciJ9.SNBz_XbiECsX23gOXApYVw'; // API key
    // mapboxgl.accessToken = 'pk.eyJ1IjoibmFiZXlhc3UiLCJhIjoiY20wZ296dHkwMDJ4NzJrcHNud3g4dGUweiJ9.vGjN2FopovRX8FdJ-Opl9A'; // API key for custom style


    // show map
    const map = new mapboxgl.Map({
        container: 'map', // container ID

        // mapbox style
        // style: 'mapbox://styles/mapbox/standard',
        style: 'mapbox://styles/mapbox/streets-v11', // 2D
        // style: 'mapbox://styles/mapbox/streets-v12', // 3D
        // style: 'mapbox://styles/nabeyasu/cm0mf6smz002q01r3gj5oa8x4', // custom

        // starting position [lng, lat]. Note that lat must be set between -90 and 90
        center: [137.0000, 36.5000], // Center of Japan
        zoom: 4.0 // starting zoom
    });

    // Add full screen control
    map.addControl(
        new mapboxgl.FullscreenControl(),
        'top-left'
    );

    // Add navigation control
    map.addControl(
        new mapboxgl.NavigationControl(),
        'top-right'
    );

    // Add GeolocateControl
    const geolocateControl = new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true,
        showUserLocation: true,
        fitBoundsOptions: {
            zoom: 8
        }
    });
    map.addControl(
        geolocateControl,
        'top-right'
    );

    // Add scale control
    map.addControl(
        new mapboxgl.ScaleControl({
            maxWidth: 80,
            unit: 'metric'
        }),
        'bottom-right'
    );

    // Disable scroll zoom
    map.scrollZoom.disable();



    // Fetch Data from PostModel
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/api/posts/get-data', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        }
    })
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            const events = [];
            const bounds = new mapboxgl.LngLatBounds();

            data.forEach(post => {
                let event = {};
                event.id = post.id;
                event.image = post.image.image;
                event.name = post.title;
                event.location = [post.event_longitude, post.event_latitude];
                event.date = post.start_date;

                events.push(event);
            });

            // create marker
            events.forEach(event => {
                // console.log(event);

                const marker = new mapboxgl.Marker()
                    .setLngLat(event.location)
                    .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popup
                        .setHTML(`
                            <div>
                                <a href="/posts/${event.id}/show" class="text-decoration-none text-black">
                                    <img src="${event.image}" style="width: 100%; height: auto;">
                                    <p class="m-0 text-start">${event.name}</p>
                                    <p class="m-0 text-start">${event.date}</p>
                                </a>
                            </div>
                        `))
                    .addTo(map);
            });
        })
        .catch(error => console.error('Error:', error));

    // On loading map
    map.on('load', () => {
        setTimeout(() => {
            geolocateControl.trigger(); // Execute to move to current location
        }, 1000); // Wait 1 sec.
    });
}
