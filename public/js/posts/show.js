'use strict';

{
    // ==== Env ====
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const hostUrl = 'http://localhost:8000';

    const translateBtn = document.getElementById('translate-btn');
    const readAloudBtn = document.getElementById('read-aloud-btn')

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

            document.getElementById('translated-article').innerText = data.translatedArticle;
        } catch (error) {
            console.error('Translation failed:', error);
            // alert('Translation failed');
        }
    });

    // ==== Read Aloud Button ====
    readAloudBtn.addEventListener('click', async function () {
        // const button = this;
        // button.disabled = true;
        // button.textContent = 'Reading...';

        readAloudBtn.disabled = true;
        // readAloudBtn.textContent = 'Reading...';

        // Get Post ID
        const postId = readAloudBtn.dataset.postId;

        const routeUri = `/posts/${postId}/read-aloud-article`;
        const url = hostUrl + routeUri;

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({})
            });

            const data = await response.json();

            if (data.audioUrl) {
                const audioPlayer = document.getElementById('audio-player');
                audioPlayer.src = data.audioUrl;
                audioPlayer.style.display = 'block';
                audioPlayer.play();
            } else {
                alert('Error: failed to generate sound file...');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error...');
        } finally {
            readAloudBtn.disabled = false;
            // readAloudBtn.textContent = 'Read aloud';
        }
    });
}
