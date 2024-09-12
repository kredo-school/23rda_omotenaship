'use strict';

{
    // =====================
    // ==== Definitions ====
    // =====================
    const hostUrl = window.location.origin;
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const translateBtn = document.getElementById('translate-btn');
    const readAloudBtn = document.getElementById('read-aloud-btn')
    const readAloudBtnTranslated = document.getElementById('read-aloud-btn-translated')

    // ===================
    // ==== Functions ====
    // ===================
    async function generateAudioUrl(article, language, hostUrl, token) {
        const body = {
            article: article,
            language: language,
        };

        const routeUri = `/posts/generate-audio-url`;
        const url = hostUrl + routeUri;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify(body)
            });

            const data = await response.json();

            if (data.audioUrl) {
                return data.audioUrl
            } else {
                alert('Error: failed to generate sound file...');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error...');
        }
    }

    function showAudioPlayer(audioPlayer, audioUrl) {
        audioPlayer.src = audioUrl;

        $(audioPlayer).fadeIn(300); // show audio player

        audioPlayer.play();
    }

    // ========================
    // ==== Main Procedure ====
    // ========================

    // ==== Event Listeners ====
    translateBtn.addEventListener('click', async function () {
        // get URL
        const hostUrl = window.location.origin;
        const routeUri = '/posts/translate-article';
        const url = hostUrl + routeUri;

        // get article to translate
        const article = document.getElementById('article').innerText;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    content: article
                }),
                credentials: 'include',  // Include authenticated information
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();

            // set translated article
            const translatedArticle = document.getElementById('translated-article');
            translatedArticle.innerText = data.translatedArticle;
            translatedArticle.dataset.language = data.language;

            // show translated article and read aloud button (show container)
            const $translatedResult = $('#translated-result');
            $translatedResult.fadeIn(300);
        } catch (error) {
            console.error('Translation failed:', error);
            // alert('Translation failed');
        }
    });

    // ==== Read Aloud Button ====
    readAloudBtn.addEventListener('click', async function () {
        readAloudBtn.disabled = true;

        // Get an article information to read
        const article = document.getElementById('article').textContent;
        const language = document.getElementById('article').dataset.language;
        const audioUrl = await generateAudioUrl(article, language, hostUrl, token);

        const audioPlayer = document.getElementById('audio-player');
        showAudioPlayer(audioPlayer, audioUrl)

        readAloudBtn.disabled = false;
    });

    // ==== Read Aloud Button Translated ====
    readAloudBtnTranslated.addEventListener('click', async function () {
        readAloudBtnTranslated.disabled = true;

        // Get an article information to read
        const translatedArticle = document.getElementById('translated-article');
        const article = translatedArticle.textContent;
        const language = translatedArticle.dataset.language;

        const audioUrl = await generateAudioUrl(article, language, hostUrl, token);

        const audioPlayer = document.getElementById('audio-player-translated');
        showAudioPlayer(audioPlayer, audioUrl)

        readAloudBtnTranslated.disabled = false;
    });
}
