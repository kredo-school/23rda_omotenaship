'use strict';

{
    const likeButtons = document.querySelectorAll('[id^="like-button-"]');
    likeButtons.forEach(likeButton => {
        // Get the post ID
        const postId = likeButton.dataset.postId;

        // Get the like icon and like count
        const likeIcon = document.getElementById(`like-icon-${postId}`);
        const likeCount = document.getElementById(`like-count-${postId}`);

        const url = `/likes/${postId}/toggle`;
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const options = {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            data: {
                'post_id': postId,
            },
        };

        // Add event listener to the like button
        likeButton.addEventListener('click', () => {
            // Send a POST request to the server
            fetch(url, options)
                // Parse the JSON response
                .then(response => response.json())

                // Update the like icon and count
                .then(data => {
                    // Change the color of the like icon
                    likeIcon.classList.toggle('fa-regular');
                    likeIcon.classList.toggle('fa-solid');
                    likeIcon.classList.toggle('text-danger');

                    // Update the like count
                    likeCount.textContent = data.postLikesCount;

                    // Change the color of the like count
                    if (likeCount.textContent == 0) {
                        if (!likeCount.classList.contains('text-white')) {
                            likeCount.classList.add('text-white');
                        }
                    } else if (likeCount.textContent > 0) {
                        if (likeCount.classList.contains('text-white')) {
                            likeCount.classList.remove('text-white');
                        }
                    }
                })
                // Catch any errors and log them to the console
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
}
