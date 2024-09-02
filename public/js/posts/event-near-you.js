'use strict';

{
    // have to fix for token to be read from .env
    mapboxgl.accessToken = 'pk.eyJ1IjoibmFiZXlhc3UiLCJhIjoiY20waG1tdDJnMGMxaDJrc2x6anZzNWl3ciJ9.SNBz_XbiECsX23gOXApYVw'; // API key

    // show map
    const map = new mapboxgl.Map({
        container: 'map', // HTMLのdiv要素のID
        style: 'mapbox://styles/mapbox/streets-v11', // Mapboxのスタイル
        center: [139.6917, 35.6895], // 地図の初期中心座標 [経度, 緯度]（東京）
        zoom: 10 // Default zoom level
    });

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
                bounds.extend(event.location); // add location to Bounds
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

            // adjust size of map to show all markers
            map.fitBounds(bounds, {
                padding: 50
            });
        })
        .catch(error => console.error('Error:', error));
}
