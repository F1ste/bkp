import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("fpage-edit");

    if (!collectionEdit) return false;

    const uploadRoute = collectionEdit.dataset.image,
        updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;

    const select = {
        link: "link",
        page: "page",
        storeButton: "store-button",
        del: "del-button",
    };

    document
        .getElementById(select.storeButton)
        .addEventListener("click", (e) => {
            let page = document.getElementById(select.page).value;
            let link = document.getElementById(select.link).value;

            if (page == "" || link == "") {
                alert("Заполните поле!");
                return false;
            }

            document.getElementById(
                select.storeButton
            ).innerHTML = `Подождите...`;

            axios
                .post(updateRoute, {
                    id: id,
                    page: page,
                    link: link,
                })
                .then((e) => {
                    location.reload();
                })
                .catch((error) => {
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
                window.location.replace("/admin/footer");
            })
            .catch((error) => {
                console.log(error.response);
            });
    });
})();
