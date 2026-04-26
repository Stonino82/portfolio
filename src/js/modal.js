// src/js/modal.js
export function initModals() {
    const modalTriggers = document.querySelectorAll('[data-modal-target]');
    const closeButtons = document.querySelectorAll('[data-modal-close]');

    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = trigger.getAttribute('data-modal-target');
            const targetModal = document.getElementById(targetId);
            if (targetModal) {
                openModal(targetModal, trigger);
            }
        });
    });

    closeButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const modal = btn.closest('.modal');
            if (modal) {
                closeModal(modal);
            }
        });
    });

    // Handle ESC key to close active modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const activeModal = document.querySelector('.modal.is-open');
            if (activeModal) {
                closeModal(activeModal);
            }
        }
    });

    function openModal(modal, trigger) {
        modal._trigger = trigger;
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');

        const closeBtn = modal.querySelector('.modal__close-btn');
        if (closeBtn) {
            setTimeout(() => closeBtn.focus(), 100);
        }
    }

    function closeModal(modal) {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');

        if (modal._trigger) {
            modal._trigger.focus();
            modal._trigger = null;
        }
    }
}
