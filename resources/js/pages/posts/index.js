import {
    enableHorizontalScrollWithWheel,
    enableHorizontalScrollWithTouch
} from '../../components/scrollFunctions';
import {
    initializeLikeButtons,
    updateLikeButtons,
} from '../../components/likeFunctions';
import {
    infiniteScroll,
} from '../../components/infiniteScrollFunctions';


'use strict';
{
    initializeLikeButtons();
    updateLikeButtons();

    const urlParams = new URLSearchParams(window.location.search);

    // console.log(urlParams);
    // console.log(urlParams.get('category'));
    // console.log(urlParams.get('search'));

    const search = urlParams.get('search');
    const category = urlParams.get('category');

    function getPosts(container, category) {
        enableHorizontalScrollWithWheel(container);
        enableHorizontalScrollWithTouch(container);
        infiniteScroll(container, container.dataset.pageName, 1, category);
    }

    const $postsContainers = $('.posts-container');
    $postsContainers.each(function () {
        const $postsContainer = $(this);
        const pageName = $postsContainer[0].dataset.pageName;

        if (search === null && category === null) {
            const $allPostsContainer = $('#all-posts-container');
            getPosts($allPostsContainer[0], category);
        } else if (search !== null) {
            // console.log(search);
        } else if (category !== null) {
            if (category === 'event') {
                if (pageName === 'recommended-posts-page') {
                    const $recommendedPostsContainer = $('#recommended-posts-container');
                    getPosts($recommendedPostsContainer[0], category);
                } else if (pageName === 'upcoming-posts-page') {
                    const $upcomingPostsContainer = $('#upcoming-posts-container');
                    getPosts($upcomingPostsContainer[0], category);
                } else if (pageName === 'ended-posts-page') {
                    const $endedPostsContainer = $('#ended-posts-container');
                    getPosts($endedPostsContainer[0], category);
                }
            } else if (category === 'volunteer') {
                if (pageName === 'recommended-posts-page') {
                    const $recommendedPostsContainer = $('#recommended-posts-container');
                    getPosts($recommendedPostsContainer[0], category);
                } else if (pageName === 'upcoming-posts-page') {
                    const $upcomingPostsContainer = $('#upcoming-posts-container');
                    getPosts($upcomingPostsContainer[0], category);
                } else if (pageName === 'ended-posts-page') {
                    const $endedPostsContainer = $('#ended-posts-container');
                    getPosts($endedPostsContainer[0], category);
                }
            } else if (category === 'review') {
                if (pageName === 'recommended-posts-page') {
                    const $recommendedPostsContainer = $('#recommended-posts-container');
                    getPosts($recommendedPostsContainer[0], category);
                } else if (pageName === 'latest-posts-page') {
                    const $latestPostsContainer = $('#latest-posts-container');
                    getPosts($latestPostsContainer[0], category);
                }
            } else if (category === 'culture') {
                if (pageName === 'recommended-posts-page') {
                    const $recommendedPostsContainer = $('#recommended-posts-container');
                    getPosts($recommendedPostsContainer[0], category);
                } else if (pageName === 'latest-posts-page') {
                    const $latestPostsContainer = $('#latest-posts-container');
                    getPosts($latestPostsContainer[0], category);
                }
            }
        }

    });

}
