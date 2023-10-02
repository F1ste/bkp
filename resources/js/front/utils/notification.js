/**
 *
 * 'title': string
 * 'description': string
 *
 * @param data
 */

export const notification = (title='Упс, что-то пошло не так', description='') => {
    const modal = `
        <div class="notification modal">
            <div class="modal-group">
                <div class="hide-modal times">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
                        <path d="M3 3L35.5 35.5" stroke="#242527" stroke-width="5" stroke-linecap="round"/>
                        <path d="M35.5 3L3 35.5" stroke="#242527" stroke-width="5" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="modal-group__title">${title}</div>
                <div class="modal-group__description">${description}</div>
                <div class="modal-group__button hide-modal">Закрыть</div>
            </div>
        </div>
    `

    document.body.insertAdjacentHTML('beforeend', modal)

    document.querySelectorAll('.notification').forEach(el => el.addEventListener('click', e => {
        if(!e.target.closest('.hide-modal')) return false

        e.target.closest('.notification').remove()
    }))
}
