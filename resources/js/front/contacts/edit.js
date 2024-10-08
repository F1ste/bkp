import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("contact-edit");

    if (!collectionEdit) return false;

    var editorData = {};
    var textareas = document.querySelectorAll("textarea:not(#map)");
    textareas.forEach(function (textarea) {
        var editor = CKEDITOR.replace(textarea, { extraPlugins: 'autolink' });
        CKFinder.setupCKEditor(editor);
        var excerptFieldName = textarea.id;
        (function (currentEditor, fieldName) {
            editorData[fieldName] = currentEditor.getData();
            currentEditor.on("change", function () {
                editorData[fieldName] = currentEditor.getData();
            });
        })(editor, excerptFieldName);
    });

    const updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;

    const select = {
        description: editorData.description,
        map: "map",
        storeButton: "store-button",
    };

    document
        .getElementById(select.storeButton)
        .addEventListener("click", (e) => {
            let description = editorData.description;
            let map = document.getElementById(select.map).value;

            if (description == "") {
                notification("Поле 'Описание' должно быть заполнено!", "error");
                return false;
            }

            document.getElementById(
                select.storeButton
            ).innerHTML = `Подождите...`;

            axios
                .post(updateRoute, {
                    id: id,
                    description: description,
                    map: map,
                })
                .then((e) => {
                    localStorage.setItem('toastMessage', JSON.stringify({
                        type: 'success',
                        description: 'Страница успешно сохранена!'
                    }));
                    location.reload();
                })
                .catch((error) => {
                    console.log(error.response);
                    notification(`Упс, что-то пошло не так \nНе удалось сохранить страницу... Попробуйте позже`, "error");
                });
        });
})();
