import axios from "axios";
import { notification } from "../utils/notification";
import { } from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.getElementById('feedback-send')



    if (!collectionEdit) return false


  
    const uploadRoute = collectionEdit.dataset.image,
        updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;

    const select = {
        description: editorData.description,
        map: 'map',
        storeButton: 'store-button',
    }


    document.getElementById(select.storeButton).addEventListener('click', e => {
        let description = editorData.description;
        let map = document.getElementById(select.map).value;

        if (description == '') {
            alert('Заполните поле!');
            return false
        }


        document.getElementById(select.storeButton).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            id: id,
            description: description,
            map: map

        }).then(e => {
            location.reload()
        }).catch(error => {
            console.log(error.response)
        })
    });

})()



















