import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("collection-edit");

    if (!collectionEdit) return false;

    const excerptEl = document.querySelector("#excerpt");
    const mainImg = document.querySelector("#img1_fin");
    const projectType = document.querySelector("#tip");
    const projectRegion = document.querySelector("#region");
    const projectTheme = document.querySelector("#tema");
    const phoneInput = document.querySelector("#tel");
    const emailInput = document.querySelector("#email");
    const dateServiceFrom = document.querySelector("#date_service_from");
    const dateServiceTo = document.querySelector("#date_service_to");
    const nameProj = document.querySelector("#name_proj");
    const contactName = document.querySelector("#name");

    function showValidateError(targetElement, isError, hintMessage) {
        const parentElement = targetElement.closest(
            ".create-project__form-item, .create-project__form-img, .create-project__form-select"
        );
        const labelElement = parentElement.querySelector("label");

        if (isError) {
            parentElement.classList.add("_form-error");

            const errorElement = document.createElement("div");
            errorElement.classList.add("form__error");
            errorElement.textContent = hintMessage;

            const existingError = labelElement.nextElementSibling;
            if (
                existingError &&
                existingError.classList.contains("form__error")
            ) {
                existingError.textContent = hintMessage;
            } else {
                labelElement.insertAdjacentElement("afterend", errorElement);
            }
        } else {
            const existingError = labelElement.nextElementSibling;
            if (
                existingError &&
                existingError.classList.contains("form__error")
            ) {
                existingError.remove();
                parentElement.classList.remove("_form-error");
            }
        }
    }

    function validatePhone(phone) {
        // Check for a valid phone number in the format 8 000 000 00 00
        const phonePattern = /^\d{1} \d{3} \d{3} \d{2} \d{2}$/;
        return phonePattern.test(phone);
    }

    function validateEmail(formRequiredItem) {
        return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(
            formRequiredItem
        );
    }

    var img1 = document.getElementById("img1_fin").getAttribute("src"),
        img2 = document.getElementById("img2_fin").getAttribute("src"),
        img3 = document.getElementById("img3_fin").getAttribute("src"),
        img4 = document.getElementById("img4_fin").getAttribute("src"),
        img5 = document.getElementById("img5_fin").getAttribute("src"),
        img6 = document.getElementById("img6_fin").getAttribute("src");

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

                if (currentEditor.id === "cke_1") {
                    var isContentExceedingLimit =
                        editorData[fieldName].length >= 1000;
                    showValidateError(
                        excerptEl,
                        isContentExceedingLimit,
                        "Не более 1000 символов"
                    );
                }
            });
        })(editor, excerptFieldName);
    });

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

    const uploadRoute = collectionEdit.dataset.image,
        updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;

    const select = {
        image: ".collection-item__upload",
        imageEl: ".collection-item",
        collectionGroup: ".collection-group",
        delete: ".collection-item__delete",
        name: "name",
        excerpt: editorData.excerpt,
        date_service_from: "date_service_from",
        date_service_to: "date_service_to",
        price: "price",
        storeButton: "store-button",
        draftButton: "draft-button",
        region: "region",
        tip: "tip",
        teg: "teg",
        tema: "tema",
        tel: "tel",
        email: "email",
        name_proj: "name_proj",
        video: "video",
        serch: "find-partners__partner-block",
        img1: "img1",
        img2: "img2",
        img3: "img3",
        img4: "img4",
        img5: "img5",
        img6: "img6",
        is_project_name_hidden: "hideNameProj",
    };

    document.getElementById(select.img1).addEventListener("click", (e) => {
        const blox = document.getElementById("img1_box");
        const avatar = document.getElementById(select.img1).dataset.img;
        const input = document.getElementById("img1_input");
        const form = document.getElementById("form_img_1");
        const fin = document.getElementById("img1_fin");
        const deleteButton = document.getElementById("img1_delete");

        input.addEventListener("change", (e) => {
            axios.post(avatar, new FormData(form)).then((e) => {
                img1 = e.data;
                fin.setAttribute("src", e.data);
                blox.style.display = "none";
                fin.style.display = "block";
                deleteButton.style.display = "block";
            });
        });

        deleteButton.addEventListener("click", (e) => {
            img1 = "";
            fin.setAttribute("src", "");
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = "";
        });
    });

    document.getElementById(select.img2).addEventListener("click", (e) => {
        const blox = document.getElementById("img2_box");
        const avatar = document.getElementById(select.img2).dataset.img;
        const input = document.getElementById("img2_input");
        const form = document.getElementById("form_img_2");
        const fin = document.getElementById("img2_fin");
        const deleteButton = document.getElementById("img2_delete");

        input.addEventListener("change", (e) => {
            axios.post(avatar, new FormData(form)).then((e) => {
                img2 = e.data;
                fin.setAttribute("src", e.data);
                blox.style.display = "none";
                fin.style.display = "block";
                deleteButton.style.display = "block";
            });
        });

        deleteButton.addEventListener("click", (e) => {
            img2 = "";
            fin.removeAttribute("src");
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = "";
        });
    });

    document.getElementById(select.img3).addEventListener("click", (e) => {
        const blox = document.getElementById("img3_box");
        const avatar = document.getElementById(select.img3).dataset.img;
        const input = document.getElementById("img3_input");
        const form = document.getElementById("form_img_3");
        const fin = document.getElementById("img3_fin");
        const deleteButton = document.getElementById("img3_delete");

        input.addEventListener("change", (e) => {
            axios.post(avatar, new FormData(form)).then((e) => {
                img3 = e.data;
                fin.setAttribute("src", e.data);
                blox.style.display = "none";
                fin.style.display = "block";
                deleteButton.style.display = "block";
            });
        });

        deleteButton.addEventListener("click", (e) => {
            img3 = "";
            fin.removeAttribute("src");
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = "";
        });
    });

    document.getElementById(select.img4).addEventListener("click", (e) => {
        const blox = document.getElementById("img4_box");
        const avatar = document.getElementById(select.img4).dataset.img;
        const input = document.getElementById("img4_input");
        const form = document.getElementById("form_img_4");
        const fin = document.getElementById("img4_fin");
        const deleteButton = document.getElementById("img4_delete");

        input.addEventListener("change", (e) => {
            axios.post(avatar, new FormData(form)).then((e) => {
                img4 = e.data;
                fin.setAttribute("src", e.data);
                blox.style.display = "none";
                fin.style.display = "block";
                deleteButton.style.display = "block";
            });
        });

        deleteButton.addEventListener("click", (e) => {
            img4 = "";
            fin.removeAttribute("src");
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = "";
        });
    });

    document.getElementById(select.img5).addEventListener("click", (e) => {
        const blox = document.getElementById("img5_box");
        const avatar = document.getElementById(select.img5).dataset.img;
        const input = document.getElementById("img5_input");
        const form = document.getElementById("form_img_5");
        const fin = document.getElementById("img5_fin");
        const deleteButton = document.getElementById("img5_delete");

        input.addEventListener("change", (e) => {
            axios.post(avatar, new FormData(form)).then((e) => {
                img5 = e.data;
                fin.setAttribute("src", e.data);
                blox.style.display = "none";
                fin.style.display = "block";
                deleteButton.style.display = "block";
            });
        });

        deleteButton.addEventListener("click", (e) => {
            img5 = "";
            fin.removeAttribute("src");
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = "";
        });
    });

    document.getElementById(select.img6).addEventListener("click", (e) => {
        const blox = document.getElementById("img6_box");
        const avatar = document.getElementById(select.img6).dataset.img;
        const input = document.getElementById("img6_input");
        const form = document.getElementById("form_img_6");
        const fin = document.getElementById("img6_fin");
        const deleteButton = document.getElementById("img6_delete");

        input.addEventListener("change", (e) => {
            axios.post(avatar, new FormData(form)).then((e) => {
                img6 = e.data;
                fin.setAttribute("src", e.data);
                blox.style.display = "none";
                fin.style.display = "block";
                deleteButton.style.display = "block";
            });
        });

        deleteButton.addEventListener("click", (e) => {
            img6 = "";
            fin.removeAttribute("src");
            blox.style.display = "block";
            fin.style.display = "none";
            deleteButton.style.display = "none";
            input.value = "";
        });
    });
    document.getElementById(select.img1).click();
    document.getElementById(select.img2).click();
    document.getElementById(select.img3).click();
    document.getElementById(select.img4).click();
    document.getElementById(select.img5).click();
    document.getElementById(select.img6).click();

    function collectFormData() {
        let name = document.getElementById(select.name).value,
            excerpt = editorData.excerpt,
            date_service_from = document.getElementById(select.date_service_from).value,
            date_service_to = document.getElementById(select.date_service_to).value,
            price = 0,
            imagesEl = document.querySelectorAll(select.imageEl),
            images = {},
            image = [],
            region = document.getElementById(select.region).value,
            tip = document.getElementById(select.tip).value,
            teg_mas = document.getElementById(select.teg),
            tema = document.getElementById(select.tema).value,
            tel = document.getElementById(select.tel).value,
            email = document.getElementById(select.email).value,
            name_proj = document.getElementById(select.name_proj).value,
            video = document.getElementById(select.video).value,
            teg = [],
            serch_mas = document.getElementsByClassName(select.serch),
            serch = [],
            is_project_name_hidden = document.getElementById(select.is_project_name_hidden).checked;
    
        //случай мульти-режима
        if (teg_mas.multiple) {
            //перебираем массив опций
            for (var i = 0; i < teg_mas.options.length; i++) {
                //если опция выбрана - добавим её в массив
                if (teg_mas.options[i].selected)
                    teg.push(teg_mas.options[i].value);
            }
            //случай одиночного выбора в select
        } else teg.push(elm.value);
    
        teg.shift();
    
        for (var i = 0; i < serch_mas.length; i++) {
            serch[i] = {};
            serch[i]["sel"] =
                serch_mas[i].getElementsByTagName("select")[0].value;
            var textareaId =
                serch_mas[i].getElementsByTagName("textarea")[0].id;
            serch[i]["tex"] = editorData[textareaId];
            serch[i]["inp"] =
                serch_mas[i].getElementsByTagName("input")[0].value;
        }
    
        for (let i = 0; imagesEl.length > i; i++) {
            if (imagesEl[i].querySelectorAll("img").length !== 0) {
                image.push(
                    imagesEl[i]
                        .querySelectorAll("img")[0]
                        .getAttribute("src")
                );
            }
        }
        images.images = image;
    
        serch_mas = Array.from(serch_mas);
    
        return {
            id: id,
            name,
            excerpt,
            date_service_from,
            date_service_to,
            price,
            images: JSON.stringify(images),
            region,
            tip,
            teg: Array.from(teg),
            tema,
            tel,
            email,
            name_proj,
            video,
            serch: Array.from(serch),
            img1: img1,
            img2: img2,
            img3: img3,
            img4: img4,
            img5: img5,
            img6: img6,
            serch_mas: serch_mas,
            teg_mas: teg_mas,
            is_project_name_hidden,
        };
    }

    document
        .getElementById(select.draftButton)
        .addEventListener("click", (e) => {
            e.preventDefault();
            let formData = collectFormData();

            if (formData.name_proj.length === 0) {
                showValidateError(nameProj, formData.name_proj.length === 0);
                alert("Необходимо заполнить название проекта для создания черновика")
                return false;
            }
    
            document.getElementById(select.draftButton).innerHTML = `Подождите...`;
    
            delete formData.serch_mas;
            delete formData.teg_mas;
            
            axios
                .post(updateRoute, {...formData, price: -1, teg: JSON.stringify(formData.teg), serch: JSON.stringify(formData.serch)})
                .then((e) => {
                    location.reload();
                })
                .catch((error) => {
                    console.log(error);
                    alert("Упс, что-то пошло не так \nНе удалось создать черновик... Попробуйте позже");
                });
        });

        document
        .getElementById(select.storeButton)
        .addEventListener("click", (e) => {
            e.preventDefault();
            let formData = collectFormData();
            if (
                formData.name.length === 0 ||
                formData.email.length === 0 ||
                !validateEmail(formData.email) ||
                formData.tel === 0 ||
                !validatePhone(formData.tel) ||
                formData.excerpt.length === 0 ||
                formData.name_proj.length === 0 ||
                formData.teg.length === 0 ||
                formData.tip.length === 0 ||
                formData.region.length === 0 ||
                formData.tema.length === 0 ||
                mainImg.getAttribute("src").length === 0 ||
                formData.excerpt.length >= 1000 ||
                formData.serch.some((item) => item.sel === "" || item.sel === undefined) ||
                formData.serch.some((item) => item.inp === "" || item.inp === undefined) ||
                formData.serch.some((item) => item.sel === "Меценат/Спонсор") && formData.serch.length === 1
            ) {
                showValidateError(
                    excerptEl,
                    formData.excerpt.length >= 1000,
                    "Не более 1000 символов"
                );
                showValidateError(
                    excerptEl,
                    formData.excerpt.length === 0,
                    "Заполните описание проекта"
                );
                showValidateError(
                    mainImg,
                    mainImg.getAttribute("src").length === 0,
                    ""
                );
                showValidateError(formData.teg_mas, formData.teg.length === 0, "");
                showValidateError(projectType, formData.tip.length === 0, "");
                showValidateError(projectRegion, formData.region.length === 0, "");
                showValidateError(projectTheme, formData.tema.length === 0, "");
                showValidateError(phoneInput, !validatePhone(formData.tel), "");
                showValidateError(emailInput, !validateEmail(formData.email), "");
                showValidateError(nameProj, formData.name_proj.length === 0);
                showValidateError(contactName, formData.name.length === 0);

                for (let i = 0; i < formData.serch_mas.length; i++) {
                    showValidateError(
                        formData.serch_mas[i].querySelector(
                            ".create-project__form-select"
                        ),
                        (formData.serch[i].sel === "Меценат/Спонсор" && formData.serch.length === 1 || formData.serch[i].sel.length === 0),
                        formData.serch[i].sel.length === 0 ? "" : "Выберите еще один вид помощи. Это увеличит ваши шансы найти партнеров"
                    );
                    showValidateError(
                        formData.serch_mas[i].querySelector(
                            ".create-project__form-input"
                        ),
                        formData.serch[i].inp.length === 0,
                        ""
                    );
                }

                showValidateError(dateServiceFrom, formData.date_service_from.length === 0);
                showValidateError(dateServiceTo, formData.date_service_to.length === 0);

                const closeBtn = document.getElementById("moderationPopup").querySelector('.popup__close');

                const clickEvent = new MouseEvent('click', {
                    bubbles: true,
                    cancelable: true,
                    view: window
                });

                closeBtn.dispatchEvent(clickEvent);

                alert("Заполните все поля выделенные красным");
                return false;
            }
    
            document.getElementById(select.storeButton).innerHTML = `Подождите...`;
    
            axios
                .post(updateRoute, {...formData, teg: JSON.stringify(formData.teg), serch: JSON.stringify(formData.serch)})
                .then((e) => {
                    if (window.location.href.includes("#moderationPopup")) {
                        history.replaceState({}, document.title, window.location.href.replace(/#moderationPopup/g, ''));
                    }
                    location.reload();
                })
                .catch((error) => {
                    console.log(error);
                    alert("Упс, что-то пошло не так \nНе удалось создать проект... Попробуйте позже");
            });
    });
})();
