// ==== Enable horizontal scrolling with mouse wheel ====
export function enableHorizontalScrollWithWheel(container, scrollSpeed = 2) {
    container.addEventListener('wheel', (event) => {
        event.preventDefault();  // Disable default vertical scrolling
        container.scrollLeft += event.deltaY * scrollSpeed;  // Convert wheel operation to horizontal scrolling
    });
}

// ==== Enable horizontal scrolling with touch gestures ====
export function enableHorizontalScrollWithTouch(container, scrollSpeed = 2) {
    let isTouching = false;
    let startX;
    let scrollLeft;

    container.addEventListener('touchstart', (e) => {
        isTouching = true;
        startX = e.touches[0].pageX - container.offsetLeft;  // X coordinate at the start of touch
        scrollLeft = container.scrollLeft;  // Record the scroll position at the start of touch
    });

    container.addEventListener('touchmove', (e) => {
        if (!isTouching) return;  // Ignore if not touching
        e.preventDefault();  // Disable default touch scrolling
        const x = e.touches[0].pageX - container.offsetLeft;  // Current touch position
        const walk = (x - startX) * scrollSpeed;  // Distance to scroll (adjustable speed)
        container.scrollLeft = scrollLeft - walk;  // Update horizontal scroll position
    });

    container.addEventListener('touchend', () => {
        isTouching = false;  // Reset flag when touch ends
    });
}
