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

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const activeModal = document.querySelector('.modal.is-open');
            if (activeModal) {
                closeModal(activeModal);
            }
        }
    });

    window.addEventListener('popstate', () => {
        const activeModal = document.querySelector('.modal.is-open');
        if (activeModal) {
            _hideModal(activeModal);
        }
    });

    function openModal(modal, trigger) {
        modal._trigger = trigger;
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
        history.pushState({ modal: true, modalId: modal.id }, '', window.location.href);

        const closeBtn = modal.querySelector('.modal__close-btn');
        if (closeBtn) {
            setTimeout(() => closeBtn.focus(), 100);
        }
    }

    function closeModal(modal) {
        if (history.state && history.state.modal) {
            history.back();
        } else {
            _hideModal(modal);
        }
    }

    function _hideModal(modal) {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');

        if (modal._trigger) {
            modal._trigger.focus();
            modal._trigger = null;
        }
    }
}
