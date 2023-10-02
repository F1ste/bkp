import axios from "axios";
import {notification} from "../utils/notification";

(() => {

    const setting = document.getElementById('setting')

    if(!setting) return false

    const updateRoute = setting.dataset.update,
        avatarUpdateRoute = setting.dataset.avatar

    const select = {
        update: 'update',
        upload: 'upload',
        avatar: 'avatar',
        surname: 'surname',
        firstname: 'first-name',
        patronymic: 'patronymic',
        city: 'city',
        phone: 'phone',
        twitter: 'twitter',
        youtube: 'youtube',
        vk: 'vk',
        facebook: 'facebook',
        about: 'about'
    }

    document.getElementById(select.upload).addEventListener('click', e => {
        const avatar = document.getElementById(select.avatar),
            form = document.createElement('form'),
            input = document.createElement('input')

        input.setAttribute('type', 'file')
        input.setAttribute('name', 'file')

        form.appendChild(input)

        input.click()

        input.addEventListener('change', e => {
            document.getElementById(select.upload).innerHTML = `Подождите...`

            axios.post(avatarUpdateRoute, new FormData(form))
                .then(e => {
                    document.getElementById(select.upload).innerHTML = `Загрузить изображение`
                    avatar.setAttribute('src', e.data)
                })
                .catch(error => {
                    document.getElementById(select.upload).innerHTML = `Ошибка...`
                    console.log(error)
                })
        })
    })

    document.getElementById(select.update).addEventListener('click', e => {
        const surname = document.getElementById(select.surname).value,
            firstname = document.getElementById(select.firstname).value,
            patronymic = document.getElementById(select.patronymic).value,
            city = document.getElementById(select.city).value,
            phone = document.getElementById(select.phone).value,
            twitter = document.getElementById(select.twitter).value,
            youtube = document.getElementById(select.youtube).value,
            vk = document.getElementById(select.vk).value,
            facebook = document.getElementById(select.facebook).value,
            about = document.getElementById(select.about).value

        if(
            surname.length === 0 ||
            firstname.length === 0 ||
            patronymic.length === 0 ||
            city.length === 0 ||
            phone.length === 0
        ) return false

        document.getElementById(select.update).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            surname: surname,
            firstname: firstname,
            patronymic: patronymic,
            city: city,
            phone: phone,
            twitter: twitter,
            youtube: youtube,
            vk: vk,
            facebook: facebook,
            about: about
        }).then(e => {
            document.getElementById(select.update).innerHTML = `Обновить`
        }).catch(error => {
            console.log(error)
            notification('Ошибка...', 'Попробуйте позже...')
        })
    })

})()














