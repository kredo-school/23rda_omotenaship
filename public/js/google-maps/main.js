


function initMap() {
    'use strict';

    // ==== Show map ====
    const target = document.getElementById('google_maps_posts_show');
    // const target = $('#google_maps_posts_show');

    const tokyo = {
        lat: 35.681167,
        lng: 139.767052,
    };

    //   show map
    const map = new google.maps.Map(target, {
        center: tokyo,
        zoom: 15,
        // disableDefaultUI: true,
        // zoomControl: true,
        // mapTypeId: 'satellite',
        // mapTypeId: 'hybrid',
        // clickableIcons: 'false', // 動作していないみたい
    });
    // =====================


}

