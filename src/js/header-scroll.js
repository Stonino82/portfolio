export default function initHeaderScroll() {
    const header = document.getElementById('masthead');
    if (!header) return;

    const scrollThreshold = 30;
    const hideDelay = 800;
    let lastScrollY = window.scrollY;
    let hideTimeout = null;

    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;
        const scrollingDown = currentScrollY > lastScrollY;

        if (currentScrollY > scrollThreshold) {
            header.classList.add('is-scrolled');
            if (scrollingDown) {
                if (!hideTimeout) {
                    hideTimeout = setTimeout(() => {
                        header.classList.add('is-hidden');
                        hideTimeout = null;
                    }, hideDelay);
                }
            } else {
                clearTimeout(hideTimeout);
                hideTimeout = null;
                header.classList.remove('is-hidden');
            }
        } else {
            clearTimeout(hideTimeout);
            hideTimeout = null;
            header.classList.remove('is-scrolled');
            header.classList.remove('is-hidden');
        }

        lastScrollY = currentScrollY;
    });
}
