import {
    enableHorizontalScrollWithWheel,
    enableHorizontalScrollWithTouch
} from '../../components/scrollFunctions';

'use strict';
{
    // ==== Functions ========================================
    function loadMorePosts(page) {
        $.ajax({
            url: `/posts/load-more-posts?page=${page}`,
            type: 'get',
        })
            .done(function (data) {
                if (data.length === 0) {
                    return;
                }
                data.html.forEach(view => {
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
    let page = 1;
    $('#all-posts-container').on('scroll', function () {
        const container = $(this);
        if (container.scrollLeft() + container.width() >= container[0].scrollWidth) {
            page++;
            loadMorePosts(page);
        }
    });

    // Enable horizontal scrolling with mouse wheel and touch gestures
    const allPostsContainer = document.getElementById('all-posts-container');
    enableHorizontalScrollWithWheel(allPostsContainer);
    enableHorizontalScrollWithTouch(allPostsContainer);





}
