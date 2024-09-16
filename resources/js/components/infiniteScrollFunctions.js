export function infiniteScroll(container, pageName, currentPage, category) {
    const $container = $(container);
    $container.on('scroll', function () {
        if ($container.scrollLeft() + $container.width() >= $container[0].scrollWidth) {
            currentPage++;
            loadMorePosts($container[0], pageName, currentPage, category);
        }
    });
}

function loadMorePosts(container, pageName, currentPage, category) {
    $.ajax({
        url: `/posts/load-more-posts`,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: {
            pageName: pageName,
            currentPage: currentPage,
            category: category,
        },
    })
        .done(function (data) {
            if (data.length === 0) {
                return;
            }
            data.views.forEach(view => {
                const $postContainer = $('<div>')
                    .addClass('post-container me-1')
                    .append(view);
                $(container).append($postContainer);
            });
        })
        .fail(function () {
            console.log('Error loading posts');
        });
}
