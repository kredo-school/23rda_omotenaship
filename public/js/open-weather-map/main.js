'use strict';

{
    const openWeatherMapData = document.getElementById('open-weather-map-data');

    const apiKey = openWeatherMapData.dataset.openWeatherMapApiKey;

    const postData = document.getElementById('post-data');
    const postLat = parseFloat(postData.dataset.postLat);
    const postLng = parseFloat(postData.dataset.postLng);

    const lat = postLat;
    const lon = postLng;

    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;



    async function getWeather() {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            console.log(data);

            if (response.ok) {
                const mainTemp = data.main.temp;
                const mainHumidity = data.main.humidity;
                const name = data.name;
                const weatherMain = data.weather[0].main;
                const weatherDescription = data.weather[0].description;
                const weatherIcon = data.weather[0].icon;
                const weatherIconUrl = `http://openweathermap.org/img/wn/${weatherIcon}@2x.png`;
                const windSpeed = data.wind.speed;

                const weatherInfo = $('#weather-info');
                weatherInfo.empty();

                // Create and append new elements
                const nameElement = $('<p>')
                    .text(`${name}`)
                    .addClass('text-center m-0');

                const weatherIconElement = $('<img>')
                    .attr('src', weatherIconUrl)
                    .attr('style', 'width: 80px; height: 80px;');
                const weatherDescriptionElement = $('<p>')
                    .text(`${weatherDescription.charAt(0).toUpperCase() + weatherDescription.slice(1)}`)
                    .addClass('m-0');


                const mainTempElement = $('<p>')
                    .text(`${mainTemp}°C`)
                    .addClass('m-0');
                const mainHumidityElement = $('<p>')
                    .text(`${mainHumidity}%`)
                    .addClass('m-0');
                const windSpeedElement = $('<p>')
                    .text(`${windSpeed}m/s`)
                    .addClass('m-0');

                const mapIcon = $('<i>')
                    .addClass('fa-solid fa-location-dot d-flex align-items-center me-1');
                const tempIcon = $('<i>')
                    .addClass('fa-solid fa-temperature-three-quarters d-flex align-items-center me-1');
                const humidityIcon = $('<i>')
                    .addClass('fa-solid fa-droplet d-flex align-items-center me-1');
                const windIcon = $('<i>')
                    .addClass('fa-solid fa-wind d-flex align-items-center me-1');

                // 組み立て
                const nameDiv = $('<div>')
                    .addClass('d-flex justify-content-center align-items-center')
                    .append(mapIcon)
                    .append(nameElement);

                const tempDiv = $('<div>')
                    .addClass('d-flex mb-2 px-2 ps-sm-4')
                    .append(tempIcon)
                    .append(mainTempElement);

                const humidityDiv = $('<div>')
                    .addClass('d-flex mb-2 px-2 ps-sm-4')
                    .append(humidityIcon)
                    .append(mainHumidityElement);

                const windDiv = $('<div>')
                    .addClass('d-flex mb-2 px-2 ps-sm-4')
                    .append(windIcon)
                    .append(windSpeedElement);


                const weatherDiv = $('<div>')
                    .addClass('d-flex justify-content-center align-items-center justify-content-sm-start')
                    .append(weatherIconElement)
                    .append(weatherDescriptionElement);

                const tempsDiv = $('<div>')
                    .addClass('d-flex justify-content-center align-items-center d-sm-block')
                    .append(tempDiv)
                    .append(humidityDiv)
                    .append(windDiv);

                weatherInfo
                    .append(nameDiv, weatherDiv, tempsDiv)
                    .addClass('pt-3');
            }
        } catch (error) {
            console.log(error);
        }
    }

    // ページがロードされたら天気情報を取得
    window.onload = getWeather;
}
