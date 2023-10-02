import axios from "axios";
import {notification} from "../utils/notification";

(() => {

    const collectionStore = document.getElementById('collection-store')

    if(!collectionStore) return false

    const storeRoute = collectionStore.dataset.store,
        uploadRoute = collectionStore.dataset.image

    const select = {
        image: '.collection-item__upload',
        imageEl: '.collection-item',
        collectionGroup: '.collection-group',
        name: 'name',
        excerpt: 'excerpt',
        style: 'style',
        gamma: 'gamma',
        storeButton: 'store-button'
    }

    document.querySelectorAll(select.collectionGroup).forEach(el => el.addEventListener('click', e => {
        e.preventDefault()

        if(!e.target.closest('.collection-item__upload')) return false

        const form = document.createElement('form'),
            input = document.createElement('input')

        input.setAttribute('type', 'file')
        input.setAttribute('name', 'file')

        form.appendChild(input)

        input.click()

        input.addEventListener('change', el => {
            axios.post(uploadRoute, new FormData(form))
                .then(data => {
                    const template = `
                        <div class="collection-item__delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.2606 4.79497C25.163 3.89258 25.163 2.42952 24.2606 1.52713C23.3582 0.624745 21.8951 0.624745 20.9928 1.52713L12.3938 10.1261L4.22544 1.9578C3.32305 1.05541 1.85999 1.05541 0.957603 1.9578C0.0552143 2.86019 0.0552143 4.32325 0.957603 5.22564L9.12593 13.394L0.895542 21.6244C-0.00684679 22.5267 -0.00684771 23.9898 0.895541 24.8922C1.79793 25.7946 3.26099 25.7946 4.16338 24.8922L12.3938 16.6618L21.0548 25.3229C21.9572 26.2252 23.4203 26.2252 24.3227 25.3229C25.2251 24.4205 25.225 22.9574 24.3227 22.055L15.6616 13.394L24.2606 4.79497Z" fill="#242527"/>
                            </svg>
                        </div>
                        <img src="${data.data}">
                    `

                    e.target.closest('.collection-item__new').innerHTML = template
                })
                .catch(error => {
                    notification('Ошибка...', 'Не удалось загрузить изображение... Попробуйте позже')
                    console.log(error)
                })
        })
    }))

    document.getElementById(select.storeButton).addEventListener('click', e => {
        let name = document.getElementById(select.name).value,
            excerpt = document.getElementById(select.excerpt).value,
            style = document.getElementById(select.style).value,
            gamma = document.getElementById(select.gamma).value,
            imagesEl = document.querySelectorAll(select.imageEl),
            images = {},
            image = []

        for(let i = 0; imagesEl.length > i; i++) {
            if(imagesEl[i].querySelectorAll('img').length !== 0) {
                image.push(imagesEl[i].querySelectorAll('img')[0].getAttribute('src'))
            }
        }
        images.images = image

        if(name.length === 0 || excerpt.length === 0) return false

        document.getElementById(select.storeButton).innerHTML = `Подождите...`

        axios.post(storeRoute, {
            name: name,
            images: JSON.stringify(images),
            excerpt: excerpt,
            style: style,
            gamma: gamma
        }).then(e => {
            window.location.href = e.data
        }).catch(error => {
            console.log(error)
            notification('Упс, что-то пошло не так', 'Не удалось создать коллекцию... Попробуйте позже')
        })
    })

})()























