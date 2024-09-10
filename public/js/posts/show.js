'use strict';

{
    // ==== Definition ====
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const translateBtn = document.getElementById('translate-btn');

    // ==== Event Listeners ====
    // When click translateBtn
    translateBtn.addEventListener('click', async function () {
        // get URL
        const hostUrl = window.location.origin;
        const routeUri = '/posts/translate-article';
        const url = hostUrl + routeUri;

        // get article to translate
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
}
