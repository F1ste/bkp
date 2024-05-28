import axios from "axios";
import { notification } from "../utils/notification";
import {} from "../libs/ckeditor/ckeditor";

(() => {
    const collectionEdit = document.querySelectorAll(".feedback-send");

    if (collectionEdit.length === 0) return false;

    const popupBlock = document.getElementById("feedbackPopup");
    const popupContent = popupBlock.querySelector(".popup__content");
    const popupSubmitBtn = popupBlock.querySelector(".popup__submit");

    const parntersSearchBlock = document.querySelector(".partners-searching");

    function getFeedbackData(e) {
        let currentTarget = e.target;

        if (!currentTarget.classList.contains("partners-searching__btn")) {
            return false;
        }

        let feedbackRole = currentTarget.dataset.role;

        popupSubmitBtn.dataset.role = feedbackRole;
    }

    const tabsBlock = document.querySelector('.partners-searching__tabs');

    document.addEventListener('DOMContentLoaded', () => {
        const firstTabData = tabsBlock.querySelector('.partners-searching__btn');
        let feedbackRole = firstTabData.dataset.role;

        popupSubmitBtn.dataset.role = feedbackRole;
    })

    parntersSearchBlock.addEventListener("click", getFeedbackData);

    function sendingFeedback(e) {
        let requestRoute = popupContent.dataset.update;
        let projectId = popupContent.dataset.id;
        let feedbackRole = e.target.dataset.role;
        let feedbackCvv = popupContent.querySelector(
            '[name="cover_letter"]'
        ).value;

        axios
            .post(requestRoute, {
                service_id: projectId,
                role_name: feedbackRole,
                cover_letter: feedbackCvv,
            })
            .then((e) => {
                popupContent.querySelector(".popup__text").innerHTML =
                    "Ваш отклик отправлен";
            })
            .catch((error) => {
                console.log(error.response);
            });
    }

    popupSubmitBtn.addEventListener("click", sendingFeedback);
})();
