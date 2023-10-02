import axios from "axios";
import {notification} from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.getElementById('admin-collection-edit')

    if(!collectionEdit) return false

    const ckeExistsing = document.querySelector('.cke');
    if (!ckeExistsing){

    var editorData = {};
    var textareas = document.querySelectorAll("textarea:not(#video)");
    textareas.forEach(function (textarea) {
      var editor = CKEDITOR.replace(textarea);
      CKFinder.setupCKEditor(editor);
      var excerptFieldName = textarea.id;
      (function (currentEditor, fieldName) {
        editorData[fieldName] = currentEditor.getData();
        currentEditor.on("change", function () {
          editorData[fieldName] = currentEditor.getData();
        });
      })(editor, excerptFieldName);
    });
    
    }

    



    const uploadRoute = collectionEdit.dataset.image,
        updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id,
        id_uzer = collectionEdit.dataset.iduzer;

    const select = {
        price: 'price',
        storeButton: 'store-button',
        storeButton2: 'store-button2',
        storeButton3: 'store-button3',
        storeButton4: 'store-button4'
    }



    document.getElementById(select.storeButton).addEventListener('click', e => {
        let  price = 1;
        let  name = document.getElementById('name_proj').value;
        document.getElementById(select.storeButton).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            id: id,
            price: price,
            name:name,
            idu: id_uzer
        }).then(e => {
            location.reload()
        }).catch(error => {
            console.log(error.response)
            notification('Упс, что-то пошло не так', 'Не удалось обновить услугу... Попробуйте позже')
        })
    })

        document.getElementById(select.storeButton2).addEventListener('click', e => {
        let  price = 2;
        let  name = document.getElementById('name_proj').value;
        document.getElementById(select.storeButton2).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            id: id,
            price: price,
            name:name,
            idu: id_uzer
        }).then(e => {
            location.reload()
        }).catch(error => {
            console.log(error.response)
            notification('Упс, что-то пошло не так', 'Не удалось обновить услугу... Попробуйте позже')
        })
    })

            document.getElementById(select.storeButton3).addEventListener('click', e => {
        let  price = 3;
        let  name = document.getElementById('name_proj').value;
        document.getElementById(select.storeButton3).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            id: id,
            price: price,
            name:name,
            idu: id_uzer
        }).then(e => {
            location.reload()
        }).catch(error => {
            console.log(error.response)
            notification('Упс, что-то пошло не так', 'Не удалось обновить услугу... Попробуйте позже')
        })
    })

               document.getElementById(select.storeButton4).addEventListener('click', e => {
        let  price = 1;
        let  name = document.getElementById('name_proj').value;
        document.getElementById(select.storeButton4).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            id: id,
            price: price,
            name:name,
            idu: id_uzer
        }).then(e => {
            location.reload()
        }).catch(error => {
            console.log(error.response)
            notification('Упс, что-то пошло не так', 'Не удалось обновить услугу... Попробуйте позже')
        })
    })

})()



















