import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("about-edit");

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

    var img1 = document.getElementById("img1_fin").getAttribute("src");

    const updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;

    const select = {
        description: editorData.description,
        img1: "img1",
        title: "title",
        storeButton: "store-button",
    };

    document.getElementById(select.img1).addEventListener("click", (e) => {
        const blox = document.getElementById("img1_box");
        const avatar = document.getElementById(select.img1).dataset.img;
        const input = document.getElementById("img1_input");
        const form = document.getElementById("form_img_1");
        const fin = document.getElementById("img1_fin");

        input.addEventListener("change", (e) => {
            axios.post(avatar, new FormData(form)).then((e) => {
                img1 = e.data;
                fin.setAttribute("src", e.data);
                blox.style.display = "none";
                fin.style.display = "block";
            });
        });
    });

    document
        .getElementById(select.storeButton)
        .addEventListener("click", (e) => {
            let title = document.getElementById(select.title).value;
            let img = img1;
            let description = editorData.description;

            if (title == "") {
                notification("Поле 'Заголовок' должно быть заполнено!", "error");
                return false;
            }
            if (description == "") {
                notification("Поле 'Описание проекта' должно быть заполнено!", "error");
                return false;
            }
            if (img == "") {
                notification("Необходимо загрузить изображение", "error");
                return false;
            }

            document.getElementById(
                select.storeButton
            ).innerHTML = `Подождите...`;

            axios
                .post(updateRoute, {
                    title: title,
                    id: id,
                    description: description,
                    img: img,
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
