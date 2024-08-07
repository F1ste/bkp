import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("fdescr-store");

    if (!collectionEdit) return false;

    var editorData = {};
    var textareas = document.querySelectorAll("textarea:not(#video)");
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

    const updateRoute = collectionEdit.dataset.store,
        id = collectionEdit.dataset.id;

    const select = {
        descr: editorData.descr,
        storeButton: "store-button",
    };

    document
        .getElementById(select.storeButton)
        .addEventListener("click", (e) => {
            let descr = editorData.descr;

            if (descr == "") {
                notification("Поле 'Описание' должно быть заполнено!", "error");
                return false;
            }

            document.getElementById(
                select.storeButton
            ).innerHTML = `Подождите...`;

            axios
                .post(updateRoute, {
                    id: id,
                    descr: descr,
                })
                .then((e) => {
                    localStorage.setItem('toastMessage', JSON.stringify({
                        type: 'success',
                        description: 'Страница успешно создана!'
                    }));
                    window.location.href = e.data;
                })
                .catch((error) => {
                    notification(`Упс, что-то пошло не так \nНе удалось создать страницу... Попробуйте позже`, "error");
                    console.log(error.response);
                });
        });
})();
