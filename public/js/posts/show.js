'use strict';

{
    // ==== Env ====
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const hostUrl = 'http://localhost:8000';

    const translateBtn = document.getElementById('translate-btn');
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
}
