import axios from "axios";
import {notification} from "../utils/notification";

(() => {

    const collection = document.getElementById('collection')

    if(!collection) return false

    const deleteRoute = collection.dataset.delete

    const select = {
        delete: '.collection-item__delete'
    }

    document.querySelectorAll(select.delete).forEach(el => el.addEventListener('click', e => {
        e.preventDefault()

        const id = e.target.closest('.collection-item').dataset.id

        axios.post(deleteRoute, {
            id: id
        }).then(data => {
            e.target.closest('.collection-item').remove()
        }).catch(error => {
            notification('Ошибка...', 'Не удалось удалить услугу')
            console.log(error)
        })
    }))

})()