import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("ficon-edit");

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

    const uploadRoute = collectionEdit.dataset.image,
        updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;

    const select = {
        style: "style",
        storeButton: "store-button",
        del: "del-button",
    };

    document
        .getElementById(select.storeButton)
        .addEventListener("click", (e) => {
            let style = document.getElementById(select.style).value;

            if (style == "") {
                notification("Поле 'Ссылка на соцсеть страницы' должно быть заполнено!", "error");
                return false;
            }

            document.getElementById(
                select.storeButton
            ).innerHTML = `Подождите...`;

            axios
                .post(updateRoute, {
                    id: id,
                    style: style,
                })
                .then((e) => {
                    localStorage.setItem('toastMessage', JSON.stringify({
                        type: 'success',
                        description: 'Страница успешно сохранена!'
                    }));
                    location.reload();
                })
                .catch((error) => {
                    notification(`Упс, что-то пошло не так \nНе удалось сохранить страницу... Попробуйте позже`, "error");
                    console.log(error.response);
                });
        });

    document.getElementById(select.del).addEventListener("click", (e) => {
        let del = document.getElementById(select.del).dataset.del;
        axios
            .post(del, {
                id: id,
            })
            .then((e) => {
                localStorage.setItem('toastMessage', JSON.stringify({
                    type: 'success',
                    description: 'Страница успешно удалена!'
                }));
                window.location.replace("/admin/footer");
            })
            .catch((error) => {
                notification(`Упс, что-то пошло не так \nНе удалось удалить страницу... Попробуйте позже`, "error");
                console.log(error.response);
            });
    });
})();
