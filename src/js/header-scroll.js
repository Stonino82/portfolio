export default function initHeaderScroll() {
    const header = document.getElementById('masthead');
    if (!header) return;

    const scrollThreshold = 30; // The scroll distance (in px) to trigger the shadow

    window.addEventListener('scroll', () => {
        if (window.scrollY > scrollThreshold) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    });
}
