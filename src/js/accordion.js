document.addEventListener('DOMContentLoaded', function () {
    const accordionItems = document.querySelectorAll('.accordion-item');

    // Function to open an accordion item
    function openAccordion(item) {
        const content = item.querySelector('.accordion-content');
        item.classList.add('active');
        content.style.maxHeight = content.scrollHeight + 'px';
        item.querySelector('.accordion-header').setAttribute('aria-expanded', 'true');
    }

    // Function to close an accordion item
    function closeAccordion(item) {
        const content = item.querySelector('.accordion-content');
        item.classList.remove('active');
        content.style.maxHeight = null;
        item.querySelector('.accordion-header').setAttribute('aria-expanded', 'false');
    }

    // Initialize accordion items
    accordionItems.forEach(item => {
        const header = item.querySelector('.accordion-header');
        const content = item.querySelector('.accordion-content');

        // Set initial state based on 'active' class
        if (item.classList.contains('active')) {
            openAccordion(item);
        } else {
            content.style.maxHeight = null;
            header.setAttribute('aria-expanded', 'false');
        }

        header.addEventListener('click', () => {
            const isActive = item.classList.contains('active');

            // Optional: Close all other accordions when one is opened
            // accordionItems.forEach(otherItem => {
            //     if (otherItem !== item) {
            //         closeAccordion(otherItem);
            //     }
            // });

            if (isActive) {
                closeAccordion(item);
            } else {
                openAccordion(item);
            }
        });
    });
});
