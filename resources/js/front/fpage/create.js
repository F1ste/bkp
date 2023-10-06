import axios from "axios";
import { notification } from "../utils/notification";
import { } from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.getElementById('fpage-store')

    if (!collectionEdit) return false

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
  
    const uploadRoute = collectionEdit.dataset.image,
        updateRoute = collectionEdit.dataset.store,
        id = collectionEdit.dataset.id;

    const select = {
        link: 'link',
        page: 'page',
        storeButton: 'store-button',
    }

    document.getElementById(select.storeButton).addEventListener('click', e => {
        let page = document.getElementById(select.page).value;
        let link = document.getElementById(select.link).value;
        if (page == '' || link =='') {
            alert('Заполните поле!');
            return false
        }


        document.getElementById(select.storeButton).innerHTML = `Подождите...`

        axios.post(updateRoute, {
            id: id,
            page: page,
            link: link,


        }).then(e => {
            window.location.href = e.data;
        }).catch(error => {
            console.log(error.response)
        })
    });

})()



















