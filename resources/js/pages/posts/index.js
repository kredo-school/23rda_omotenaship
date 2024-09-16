import {
    enableHorizontalScrollWithWheel,
    enableHorizontalScrollWithTouch
} from '../../components/scrollFunctions';

'use strict';
{
    // ==== Functions ========================================
    function loadMorePosts(pageName, currentPage) {
        $.ajax({
            url: `/posts/load-more-posts`,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                pageName: pageName,
                currentPage: currentPage
            },
        })
            .done(function (data) {
                if (data.length === 0) {
                    return;
                }
                data.views.forEach(view => {
                    const postContainer = $('<div>')
                        .addClass('post-container me-1')
                        .append(view);
                    $('#all-posts-container').append(postContainer);
                });
            })
            .fail(function () {
                console.log('Error loading posts');
            });
    }

    // ==== Main =============================================
    // For All Posts
    const pageName = 'all-posts-page';
    let currentPage = 1;
    $('#all-posts-container').on('scroll', function () {
        const container = $(this);
        if (container.scrollLeft() + container.width() >= container[0].scrollWidth) {
            currentPage++;
            loadMorePosts(pageName, currentPage);
        }
    });

    // Enable horizontal scrolling with mouse wheel and touch gestures
    const allPostsContainer = document.getElementById('all-posts-container');
    enableHorizontalScrollWithWheel(allPostsContainer);
    enableHorizontalScrollWithTouch(allPostsContainer);





}
