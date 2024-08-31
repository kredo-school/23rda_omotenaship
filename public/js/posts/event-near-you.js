'use strict';

{
    mapboxgl.accessToken = 'pk.eyJ1IjoibmFiZXlhc3UiLCJhIjoiY20waG1tdDJnMGMxaDJrc2x6anZzNWl3ciJ9.SNBz_XbiECsX23gOXApYVw'; // API key

    // show map
    const map = new mapboxgl.Map({
        container: 'map', // HTMLのdiv要素のID
        style: 'mapbox://styles/mapbox/streets-v11', // Mapboxのスタイル
        center: [139.6917, 35.6895], // 地図の初期中心座標 [経度, 緯度]（東京）
        zoom: 10 // Default zoom level
    });

    // Events Data
    const events = [
        {
            name: "Event 1",
            location: [139.7000, 35.6895], // [経度, 緯度]
            date: "2024-09-01"
        },
        {
            name: "Event 2",
            location: [139.7500, 35.6586],
            date: "2024-09-02"
        }
    ];

    // create marker
    events.forEach(event => {
        const marker = new mapboxgl.Marker()
            .setLngLat(event.location)
            .setPopup(new mapboxgl.Popup({ offset: 25 }) // ポップアップを追加
                .setText(`${event.name} - ${event.date}`))
            .addTo(map);
    });

}
