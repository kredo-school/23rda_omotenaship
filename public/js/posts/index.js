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



    const slider = document.getElementById('all-posts-container');
    let isDown = false;  // ドラッグ状態を記録する変数
    let startX;  // マウスの開始位置を記録する変数
    let scrollLeft;  // スクロール位置を記録する変数

    // マウスが押されたときの動作
    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');  // マウスが押された状態を表現するためのクラス
        startX = e.pageX - slider.offsetLeft;  // マウスのX座標を記録
        scrollLeft = slider.scrollLeft;  // 現在のスクロール位置を記録
        slider.style.cursor = 'grabbing';  // カーソルを変える
    });

    // マウスが離されたときの動作
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
        slider.style.cursor = 'grab';  // カーソルを元に戻す
    });

    // マウスがスライダーの領域から出たとき
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
        slider.style.cursor = 'grab';  // カーソルを元に戻す
    });

    // マウスが動いたときの動作
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;  // マウスが押されていないときは何もしない
        e.preventDefault();  // ドラッグ選択を防ぐためにデフォルトの動作を防止
        const x = e.pageX - slider.offsetLeft;  // マウスの現在のX座標
        const walk = (x - startX) * 2;  // スクロール距離を計算（調整可能）
        slider.scrollLeft = scrollLeft - walk;  // スクロール位置を更新
    });


}
