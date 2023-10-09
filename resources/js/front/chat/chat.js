import axios from "axios";
import {notification} from "../utils/notification";

(()=>{
    const chat = document.getElementById('personal-chat');

    if (!chat) return false;

    let pusher = new Pusher('c8811e977d93532dcb3a', {
        cluster: 'eu',
        encrypted: true
    });

    const dialogueBlock = document.querySelector('.chat__dialogue');
    const firstId = dialogueBlock.dataset.first_user;
    const secondId = dialogueBlock.dataset.second_user;

    let channel = pusher.subscribe(`store_chat_${firstId}_${secondId}`);
    channel.bind('store_chat', function(data) {
        axios.get('/profile/chat', { message: data.message })
            .then(function (response) {
                console.log(json(response));
                // Обработка успешной отправки
                messageInput.value = '';
            })
            .catch(function (error) {
                console.log(error.response);
                // Обработка ошибок
            });
    });

    const messageInput = document.getElementById('chatInput');
    if (messageInput) {
        document.getElementById('chat-form').addEventListener('submit', function (e) {
            e.preventDefault();
            let message = messageInput.value;
            let userId = messageInput.dataset.user;
            let currentURL = window.location.href;
            let queryString = currentURL.split('?')[1];
            let queryParams = queryString.split('&');
            let chatId = null;
            for (let i = 0; i < queryParams.length; i++) {
                let param = queryParams[i].split('=');
                if (param[0] === 'id') {
                    chatId = param[1];
                    break;
                }
            }
    
            axios.post('/profile/chat/sendmessage', { 
                message: message, 
                chat_id: chatId,
                user_id: userId
            })
                .then(function (response) {
    /*                 console.log(response); */
                    // Обработка успешной отправки
                    messageInput.value = '';
                })
                .catch(function (error) {
                    console.log(error.response);
                    // Обработка ошибок
                });
        });
    }


    const chatsMenu = document.querySelector('.chat__contact-wrapper');
    const chatValue = document.getElementById('chatValue');
    
    function getChatValue(e) {
        e.preventDefault();
        let currentTarget = e.target;
        if (!currentTarget.classList.contains('chat__contact-item')) {
            return;
        }
    
/*         currentTarget.classList.add('_contact-active'); */
        chatValue.value = currentTarget.dataset.chat;
        

        chatsMenu.submit();
    }
    
    chatsMenu.addEventListener('click', getChatValue);

})()
