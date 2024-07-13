import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.getElementById("banner-edit");

    if (!collectionEdit) return false;

    var img1 = document.getElementById("img1_fin").getAttribute("src");
    const updateRoute = collectionEdit.dataset.update,
        id = collectionEdit.dataset.id;

    const select = {
        img1: "img1",
        name: "name",
        storeButton: "store-button",
        del: "del-button",
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
            ).checked;
            let org_name = document.getElementById(select.org_name).value;
            let org_inn = document.getElementById(select.org_inn).value;
            let erid = document.getElementById(select.erid).value;

            if (name == "") {
                notification("Поле 'Ссылка баннера' должно быть заполнено!", "error");
                return false;
            }

            document.getElementById(
                select.storeButton
            ).innerHTML = `Подождите...`;

            axios
                .patch(updateRoute, {
                    name: name,
                    id: id,
                    img1: img1,
                    advertisement: advertisement,
                    org_name: org_name,
                    org_inn: org_inn,
                    erid: erid,
                })
                .then((e) => {
                    localStorage.setItem('toastMessage', JSON.stringify({
                        type: 'success',
                        description: 'Баннер успешно сохранён!'
                    }));
                    location.reload();
                })
                .catch((error) => {
                    console.log(error.response);
                    notification(`Упс, что-то пошло не так \nНе удалось сохранить баннер... Попробуйте позже`, "error");
                });
        });

    document.getElementById(select.del).addEventListener("click", (e) => {
        let del = document.getElementById(select.del).dataset.del;
        axios
            .delete(del, {
                id: id,
            })
            .then((e) => {
                localStorage.setItem('toastMessage', JSON.stringify({
                    type: 'success',
                    description: 'Баннер успешно удалён!'
                }));
                window.location.replace("/admin/banners");
            })
            .catch((error) => {
                console.log(error.response);
                notification(`Упс, что-то пошло не так \nНе удалось удалить баннер... Попробуйте позже`, "error");
            });
    });
})();
