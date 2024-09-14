function initMap() {
    'use strict';

    const target = document.getElementById('google-maps-posts-show');

    const postData = document.getElementById('post-data');
    const postId = parseInt(postData.dataset.postId);
    const postLat = parseFloat(postData.dataset.postLat);
    const postLng = parseFloat(postData.dataset.postLng);

    const postLocation = {
        lat: postLat,
        lng: postLng,
    };

    // ==== Show map ====
    const map = new google.maps.Map(target, {
        center: postLocation,
        zoom: 12,
        // UI options:
        disableDefaultUI: true,
        zoomControl: true,
        mapTypeId: 'terrain', // 'roadmap', 'satellite', 'hybrid', 'terrain'
        draggable: true, // Enable dragging the map
        scrollwheel: false, // Enable zooming with the mouse scroll wheel
        streetViewControl: true, // Enable the street view control
        fullscreenControl: true, // Enable the fullscreen control
        mapTypeControl: false, // Enable the map type control
        scaleControl: true, // Enable the scale control
    });

    // ==== Show marker ====
    const marker = new google.maps.Marker({
        position: postLocation,
        map: map,
    });

    // ==== Show info window ====
    const contentString = `
    <div class="google-maps-info-window">
    Click the pin to search route!
    </div>
    `;

    const infoWindow = new google.maps.InfoWindow({
        content: contentString,
        // maxWidth: 200, // Set the maximum width of the info window
        disableAutoPan: true, // Disable automatic panning of the info window
        // pixelOffset: new google.maps.Size(0, -30), // Adjust the position of the info window
        closeBox: false, // Show the close box
        closeBoxURL: '', // Set the URL of the close button
        // enableEventPropagation: true, // Allow events to propagate to the map
    });
    infoWindow.open(map, marker);

    // ==== Show route ====
    marker.addListener('click', function () {
        // Get user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                const origin = `${userLocation.lat},${userLocation.lng}`;
                const destination = `${postLocation.lat},${postLocation.lng}`;
                const travelmode = ''; // 'driving', 'walking', 'bicycling', 'transit'

                const url = `https://www.google.com/maps/dir/?api=1&origin=${origin}&destination=${destination}&travelmode=${travelmode}`;

                window.open(url, '_blank');
            });
        };
    });
}
