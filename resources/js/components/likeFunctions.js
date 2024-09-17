export function initializeLikeButtons() {
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.body;
        addLikeButtons(container);
    });
}

export function updateLikeButtons() {
    const callback = (mutationList, observer) => {
        for (const mutation of mutationList) {
            if (mutation.type === 'childList') {
                if (mutation.addedNodes.length > 0) {
                    mutation.addedNodes.forEach((node) => {
                        if (node.nodeType === 1) { // Element node
                            // console.log('Node added:', node);
                            addLikeButtons(node);
                        }
                    });
                }
            }
        }
    };
    const targetNode = document.body;
    const observerOptions = {
        childList: true,
        subtree: true,
    };

    const observer = new MutationObserver(callback);
    observer.observe(targetNode, observerOptions);
}

function addLikeButtons(container) {
    if (!container) {
        console.log('Container not found');
        return;
    }

    const likeButtons = container.querySelectorAll('[class*="like-button-"]');
    likeButtons.forEach(likeButton => {
        // Get the post ID
        const postId = likeButton.dataset.postId;

        const url = `/likes/${postId}/toggle`;
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const options = {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                'post_id': postId,
            }),
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
                    const likeIcons = document.querySelectorAll(`.like-icon-${postId}`);
                    likeIcons.forEach(likeIcon => {
                        likeIcon.classList.toggle('fa-regular');
                        likeIcon.classList.toggle('fa-solid');
                        likeIcon.classList.toggle('text-danger');
                    });

                    // Update the like count
                    const likeCounts = document.querySelectorAll(`.like-count-${postId}`);
                    likeCounts.forEach(likeCount => {
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
                    });
                })
                // Catch any errors and log them to the console
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
}
