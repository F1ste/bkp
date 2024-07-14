import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.querySelector(".feedback-status");

    if (!collectionEdit) return false;

    function setStatusAprove(e) {
        let currentTarget = e.target;
        let status = currentTarget.getAttribute("data-status");

        if (status === "aprove") {
            let updateRoute = currentTarget.getAttribute("data-update");
            axios
                .put(updateRoute, {})
                .then((e) => {
                    localStorage.setItem('toastMessage', JSON.stringify({
                        type: 'success',
                        description: 'Статус отклика успешно изменён!'
                    }));
                    location.reload();
                })
                .catch((error) => {
                    notification(`Упс, что-то пошло не так \nНе удалось изменить статус отклика... Попробуйте позже`, "error");
                    console.log(error.response);
                });
        } else if (status === "decline") {
            let updateRoute = currentTarget.getAttribute("data-update");

            axios
                .put(updateRoute, {})
                .then((e) => {
                    localStorage.setItem('toastMessage', JSON.stringify({
                        type: 'success',
                        description: 'Статус отклика успешно изменён!'
                    }));
                    location.reload();
                })
                .catch((error) => {
                    notification(`Упс, что-то пошло не так \nНе удалось изменить статус отклика... Попробуйте позже`, "error");
                    console.log(error.response);
                });
        }
    }

    const getChatBtn = document.getElementById("getChat");
    const getChatRoute = getChatBtn?.dataset.update;
    const getUser1 = getChatBtn?.dataset.user1;
    const getUser2 = getChatBtn?.dataset.user2;

    function getChat(e) {
        let currentTarget = e.target;

        axios
            .post(getChatRoute, {
                first_user_id: getUser1,
                second_user_id: getUser2,
            })
            .then((e) => {
                window.location.replace(getChatRoute);
            })
            .catch((error) => {
                notification(`Упс, что-то пошло не так \nНе удалось получить страницу чата... Попробуйте позже`, "error");
                console.log(error.response);
            });
    }

    getChatBtn?.addEventListener("click", getChat);
    collectionEdit.addEventListener("click", setStatusAprove);
})();
