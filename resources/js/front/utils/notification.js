/**
 * @description Всплывающие уведомления
 * @property {string} description - Текст уведомления
 * @property {"info" | "success" | "warning" | "error"} type - Тип уведомления
 * @property {number} duration - Время, через которое уведомление исчезает
 */

export function notification(description = "Упс... Что-то пошло не так, попробуйте позже", type = "info", duration = 5000) {
    const toastContainer = document.querySelector('.notifications-container');

    const toast = document.createElement('div');
    toast.className = `toastNotification ${type}`;
    toast.innerHTML = description.replace(/\n/g, '<br>');

    const closeBtn = document.createElement('button');
    closeBtn.className = `popup__close toastNotifications__close`;

    toastContainer.appendChild(toast);
    toast.appendChild(closeBtn);

    requestAnimationFrame(() => {
        toast.classList.add('show');
    });

    closeBtn.addEventListener('click', () => {
        toast.classList.remove('show');
        toast.classList.add('hide');
        toast.addEventListener('transitionend', () => {
            toast.remove();
        });
    })

    setTimeout(() => {
        toast.classList.remove('show');
        toast.classList.add('hide');
        toast.addEventListener('transitionend', () => {
            toast.remove();
        });
    }, duration);
}
