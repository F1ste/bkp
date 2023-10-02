import axios from "axios";
import { notification } from "../utils/notification";
import { } from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.getElementById('about-edit')



    if (!collectionEdit) return false



    const uploadRoute = collectionEdit.dataset.image,
        updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;



    const select = {
        description: 'description',
        img: 'img',
        title: 'title',
        storeButton: 'store-button',
    }






    document.getElementById(select.storeButton).addEventListener('click', e => {
        let title = document.getElementById(select.title).value;

        if (title == '') {
            alert('Заполните поле!');
            return false
        }
        if (description == '') {
            alert('Заполните поле!');
            return false
        }
        if (img == '') {
            alert('Заполните поле!');
            return false
        }

        document.getElementById(select.storeButton).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            title: title,
            id: id,
            description: description,
            img: img

        }).then(e => {
            location.reload()
        }).catch(error => {
            console.log(error.response)
        })
    });



    document.getElementById(select.del).addEventListener('click', e => {

        let del = document.getElementById(select.del).dataset.del;
        axios.post(del, {
            id: id

        }).then(e => {
            window.location.replace("/admin/about");
        }).catch(error => {
            console.log(error.response)
        })

    });



})()



















