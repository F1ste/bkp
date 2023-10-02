import axios from "axios";
import {notification} from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.getElementById('banner-edit')



    if(!collectionEdit) return false


        var img1 = document.getElementById('img1_fin').getAttribute('src');





    const uploadRoute = collectionEdit.dataset.image,
     updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;



    const select = {
       img1: 'img1',
        name: 'name',
        storeButton: 'store-button',
         del: 'del-button',
    }

 document.getElementById(select.img1).addEventListener('click', e => {
        const blox = document.getElementById('img1_box');
        const avatar = document.getElementById(select.img1).dataset.img;
        const input = document.getElementById('img1_input');
        const form = document.getElementById('form_img_1');
        const fin = document.getElementById('img1_fin');

         input.addEventListener('change', e => {
             axios.post(avatar, new FormData(form))
                .then(e => {
                    img1 = e.data;
                    fin.setAttribute('src', e.data);
                    blox.style.display = "none";
                    fin.style.display = "block";
                })

         })

    })




    document.getElementById(select.storeButton).addEventListener('click', e => {
        let name = document.getElementById(select.name).value;

            if(name == ''){
            alert('Заполните поле!');
            return false
        }

        document.getElementById(select.storeButton).innerHTML = `Подождите...`

        axios.post(updateRoute, {
             name: name,
            id: id,
            img1: img1

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
            window.location.replace("/admin/banners");
        }).catch(error => {
            console.log(error.response)
        })

         });



})()



















