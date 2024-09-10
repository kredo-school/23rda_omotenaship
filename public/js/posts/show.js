'use strict';

{
    // ==== Env ====
    // const hostUrl = 'http://localhost:8000';
    const hostUrl = window.location.origin;
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const translateBtn = document.getElementById('translate-btn');
    const readAloudBtn = document.getElementById('read-aloud-btn')
    const readAloudBtnTranslated = document.getElementById('read-aloud-btn-translated')

    translateBtn.addEventListener('click', async function () {
        const routeUri = '/posts/translate-article';
        // const routeUri = '/api/posts/translate-article';
        const url = hostUrl + routeUri;
        const article = document.getElementById('article').innerText;

        // console.log(article);
        // console.log(token);

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
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

            // show translated article
            const translatedArticle = document.getElementById('translated-article');
            translatedArticle.innerText = data.translatedArticle;
            translatedArticle.dataset.language = data.language;

            // show read aloud button
            readAloudBtnTranslated.style.display = 'block';
        } catch (error) {
            console.error('Translation failed:', error);
            // alert('Translation failed');
        }
    });



    // ==== Functions ====
    // async function readAloud(postId, article, language, hostUrl, token) {
    async function generateAudioUrl(article, language, hostUrl, token) {
        const body = {
            article: article,
            language: language,
        };

        // const routeUri = `/posts/${postId}/read-aloud-article`;
        const routeUri = `/posts/generate-audio-url`;
        const url = hostUrl + routeUri;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
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
        audioPlayer.style.display = 'block';
        audioPlayer.src = audioUrl;
        audioPlayer.play();
    }

    // ==== Read Aloud Button ====
    readAloudBtn.addEventListener('click', async function () {
        readAloudBtn.disabled = true;

        // Get Post ID
        // const postId = readAloudBtn.dataset.postId;

        // Get an article information to read
        const article = document.getElementById('article').textContent;
        const language = document.getElementById('article').dataset.language;
        // const audioUrl = await readAloud(postId, article, language, hostUrl, token);
        const audioUrl = await generateAudioUrl(article, language, hostUrl, token);

        const audioPlayer = document.getElementById('audio-player');
        showAudioPlayer(audioPlayer, audioUrl)

        readAloudBtn.disabled = false;
    });

    // ==== Read Aloud Button Translated ====
    readAloudBtnTranslated.addEventListener('click', async function () {
        readAloudBtnTranslated.disabled = true;

        // Get Post ID
        // const postId = 1; // temp

        // Get an article information to read
        const translatedArticle = document.getElementById('translated-article');
        const article = translatedArticle.textContent;
        const language = translatedArticle.dataset.language;
        // const audioUrl = await readAloud(postId, article, language, hostUrl, token);
        const audioUrl = await generateAudioUrl(article, language, hostUrl, token);

        const audioPlayer = document.getElementById('audio-player-translated');
        showAudioPlayer(audioPlayer, audioUrl)

        readAloudBtnTranslated.disabled = false;
    });


}
