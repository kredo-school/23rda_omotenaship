document.addEventListener('DOMContentLoaded', function() {
    const favoriteButtons = document.querySelectorAll('[id^="favorite-button-"]');

    favoriteButtons.forEach(favoriteButton => {
        const postId = favoriteButton.dataset.postId;
        const favoriteIcon = document.getElementById(`favorite-icon-${postId}`);
        const url = `/favorites/${postId}/toggle`;
        const token = document.querySelector('meta[name="csrf-token"]').content;

        favoriteButton.addEventListener('click', function(e) {
            e.preventDefault();  // Prevent page reload

            const options = {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ post_id: postId }),  // Send post_id in the request body
            };

            fetch(url, options)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'added') {
                        favoriteIcon.classList.remove('fa-regular');
                        favoriteIcon.classList.add('fa-solid', 'text-warning');
                    } else if (data.status === 'removed') {
                        favoriteIcon.classList.remove('fa-solid', 'text-warning');
                        favoriteIcon.classList.add('fa-regular');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
