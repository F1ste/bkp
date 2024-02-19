import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionStore = document.getElementById("banner-store");

    if (!collectionStore) return false;

    const storeRoute = collectionStore.dataset.store;

    var img1 = "";

    const select = {
        img1: "img1",
        name: "name",
        storeButton: "store-button",
        advertisement: "advertisement",
        org_name: "orgName",
        org_inn: "orgINN",
        erid: "erid",
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
            let name = document.getElementById(select.name).value;
            let advertisement = document.getElementById(
                select.advertisement
            ).value;
            let org_name = document.getElementById(select.org_name).value;
            let org_inn = document.getElementById(select.org_inn).value;
            let erid = document.getElementById(select.erid).value;

            if (name == "") {
                alert("Заполните все поля!");
                return false;
            }

            document.getElementById(
                select.storeButton
            ).innerHTML = `Подождите...`;

            axios
                .post(storeRoute, {
                    name: name,
                    img1: img1,
                    advertisement: advertisement,
                    org_name: org_name,
                    org_inn: org_inn,
                    erid: erid,
                })
                .then((e) => {
                    window.location.href = e.data;
                })
                .catch((error) => {
                    console.log(error);
                    notification(
                        "Упс, что-то пошло не так",
                        "Не удалось создать услугу... Попробуйте позже"
                    );
                });
        });
})();
