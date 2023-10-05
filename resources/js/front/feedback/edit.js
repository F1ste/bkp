import axios from "axios";
import { notification } from "../utils/notification";
import { } from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.querySelectorAll('.feedback-send')



    if (collectionEdit.length === 0) return false

    const popupBlock = document.getElementById('feedbackPopup');
    const popupContent = popupBlock.querySelector('.popup__content');
    const popupSubmitBtn = popupBlock.querySelector('.popup__submit');

    const parntersSearchBlock = document.querySelector('.partners-searching');

    
    function getFeedbackData(e) {
        let currentTarget = e.target;

        if (!currentTarget.classList.contains('partners-searching__btn')) {
            return false;
        }

        let feedbackRole = currentTarget.dataset.role;
        let feedbackText = currentTarget.closest('.feedback-send').querySelector('.partners-searching__partner-description').textContent;

        popupSubmitBtn.dataset.role = feedbackRole;
        popupSubmitBtn.dataset.cvv = feedbackText;
    }

    parntersSearchBlock.addEventListener('click', getFeedbackData)


    function sendingFeedback(e) {
        let requestRoute = popupContent.dataset.update;
        let projectId = popupContent.dataset.id
        let feedbackRole = e.target.dataset.role;
        let feedbackText = e.target.dataset.cvv;
        
        axios.post(requestRoute, {
            service_id: projectId,
            role_name: feedbackRole,
            cover_letter: feedbackText,

        }).then(e => {
            popupContent.querySelector('.popup__text').innerHTML = 'Ваш отклик отправлен';
        }).catch(error => {
            console.log(error.response)
        }) 
    }

    popupSubmitBtn.addEventListener('click', sendingFeedback);

})()



















