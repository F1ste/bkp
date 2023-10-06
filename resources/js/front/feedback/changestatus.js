import axios from "axios";
import { notification } from "../utils/notification";
import { } from "../libs/ckeditor/ckeditor";
(() => {

    const collectionEdit = document.querySelector('.feedback-status')



    if (!collectionEdit) return false

    


    function setStatusAprove(e) {
        let currentTarget = e.target;
        let status = currentTarget.getAttribute('data-status');

        if (status === 'aprove') {
            let updateRoute = currentTarget.getAttribute('data-update');

            axios.put(updateRoute, {

    
            }).then(e => {
                alert('Статус отклика изменен')
            }).catch(error => {
                console.log(error.response)
            }) 
        } else if (status === 'decline') {
            let updateRoute = currentTarget.getAttribute('data-update');

            axios.put(updateRoute, {

            }).then(e => {
                alert('Статус отклика изменен')
            }).catch(error => {
                console.log(error.response)
            })
        }
    }


    collectionEdit.addEventListener('click', setStatusAprove)



})()



















