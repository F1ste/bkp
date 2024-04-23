document.addEventListener("click", function (e) {
    let target = e.target.dataset.modal;
    let modal = document.querySelector(target);
    if (! modal) {
        return;
    }

    let wrapper = modal.closest('.modal-wrapper');
    wrapper.style.display = null;
    wrapper.removeAttribute('hidden');
});

document.addEventListener("click", function (e) {
    let target = null;

    if (e.target.classList.contains('modal-wrapper')) {
        target = e.target;
    } else if (e.target.classList.contains('modal-close')) {
        target = e.target.closest('.modal-wrapper');
    }

    if (target) {
        target.style.display = 'none';
        target.setAttribute('hidden', '');
    }
});
