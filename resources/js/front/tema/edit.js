import axios from "axios";
import {notification} from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.getElementById('tema-edit')



    if(!collectionEdit) return false



    const uploadRoute = collectionEdit.dataset.image,
     updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;



    const select = {
        name: 'name',
        storeButton: 'store-button',
         del: 'del-button',
    }






    document.getElementById(select.storeButton).addEventListener('click', e => {
        let name = document.getElementById(select.name).value;

            if(name == ''){
            alert('Заполните поле!');
            return false
        }

        document.getElementById(select.storeButton).innerHTML = `Подождите...`

        axios.post(updateRoute, {
             name: name,
            id: id

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
            window.location.replace("/admin/tema");
        }).catch(error => {
            console.log(error.response)
        })

         });



})()



















