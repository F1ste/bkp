import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("admin-collection-edit");

    if (!collectionEdit) return false;

    const ckeExistsing = document.querySelector(".cke");
    if (!ckeExistsing) {
        var editorData = {};
        var textareas = document.querySelectorAll("textarea:not(#video):not(#cover_letter)");
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
    }

    const findPartnerSect = document.querySelector(
        ".create-project__find-partners"
    );
    const addPartnerBtn = findPartnerSect.querySelector(".add-partner__input").closest('.add-partner');
    let partnersEditors = document.querySelectorAll(
        ".find-partners__partner-block"
    );
    let editorsCount = partnersEditors.length;
    if (addPartnerBtn) {
        function initializeCKEditorForTextarea(textareaId) {
            var editor = CKEDITOR.replace(textareaId, { extraPlugins: 'autolink' });
            CKFinder.setupCKEditor(editor);
            var excerptFieldName = textareaId;
            editorData[excerptFieldName] = editor.getData();
            editor.on("change", function () {
                editorData[excerptFieldName] = editor.getData();
            });
        }

        addPartnerBtn.addEventListener("click", () => {
            setTimeout(() => {
                var newTextareaId =
                    "FormProjectPartnerDescription" + editorsCount;
                initializeCKEditorForTextarea(newTextareaId);
                editorsCount++;
            }, 1);
        });
    }

    const updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id,
        id_uzer = collectionEdit.dataset.iduzer;

    const select = {
        price: "price",
        storeButton: "store-button",
        storeButton2: "store-button2",
        storeButton3: "store-button3",
        storeButton4: "store-button4",
    };

    document
        .getElementById(select.storeButton)
        .addEventListener("click", (e) => {
            document.getElementById(select.storeButton).innerHTML = `Подождите...`;

            axios
                .patch(updateRoute, { status: 1 })
                .then((e) => {
                    location.reload();
                })
                .catch((error) => {
                    console.log(error.response);
                    notification(
                        "Упс, что-то пошло не так",
                        "Не удалось обновить услугу... Попробуйте позже"
                    );
                });
        });

    document
        .getElementById(select.storeButton2)
        .addEventListener("click", (e) => {
            document.getElementById(
                select.storeButton2
            ).innerHTML = `Подождите...`;

            axios
                .patch(updateRoute, { status: 2 })
                .then((e) => {
                    location.reload();
                })
                .catch((error) => {
                    console.log(error.response);
                    notification(
                        "Упс, что-то пошло не так",
                        "Не удалось обновить услугу... Попробуйте позже"
                    );
                });
        });

/*     document
        .getElementById(select.storeButton3)
        .addEventListener("click", (e) => {
            if (! confirm('Вы хотите отклонить проект?')) {
                return;
            }

            document.getElementById(select.storeButton3).innerHTML = `Подождите...`;

            axios
                .patch(updateRoute, { status: 3 })
                .then((e) => {
                    location.reload();
                })
                .catch((error) => {
                    console.log(error.response);
                    notification(
                        "Упс, что-то пошло не так",
                        "Не удалось обновить услугу... Попробуйте позже"
                    );
                });
        }); */

    document
        .getElementById(select.storeButton4)
        .addEventListener("click", (e) => {
            document.getElementById(
                select.storeButton4
            ).innerHTML = `Подождите...`;

            axios
                .patch(updateRoute, { status: 1 })
                .then((e) => {
                    location.reload();
                })
                .catch((error) => {
                    console.log(error.response);
                    notification(
                        "Упс, что-то пошло не так",
                        "Не удалось обновить услугу... Попробуйте позже"
                    );
                });
        });
})();
