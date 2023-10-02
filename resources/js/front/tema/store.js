import axios from "axios";
import {notification} from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";
(() => {

    const collectionStore = document.getElementById('tema-store')

    if(!collectionStore) return false

    const storeRoute = collectionStore.dataset.store;

    var img1 = '';


    const select = {
        name: 'name',
        storeButton: 'store-button'
    }






    document.getElementById(select.storeButton).addEventListener('click', e => {
        let name = document.getElementById(select.name).value;



        if(name == ''){
            alert('Заполните все поля!');
            return false
        }


        document.getElementById(select.storeButton).innerHTML = `Подождите...`



        axios.post(storeRoute, {
            name: name
        }).then(e => {
            window.location.href = e.data
        }).catch(error => {
            console.log(error)
            notification('Упс, что-то пошло не так', 'Не удалось создать услугу... Попробуйте позже')
        })
    })


})()























