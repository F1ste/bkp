import axios from "axios";
import {notification} from "../utils/notification";

(()=>{
    const chat = document.getElementById('personal-chat');

    if (!chat) return false;

    let pusher = new Pusher('c8811e977d93532dcb3a', {
        cluster: 'eu',
        encrypted: true
    });

    let channel = pusher.subscribe('store_chat');
    channel.bind('store_chat', function(data) {
        axios.get('/profile/chat', { message: data.message })
            .then(function (response) {
                console.log(response);
                // Обработка успешной отправки
                messageInput.value = '';
            })
            .catch(function (error) {
                console.log(error.response);
                // Обработка ошибок
            });
    });

    const messageInput = document.getElementById('chatInput');
    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault();
        let message = messageInput.value;
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
        console.log(chatId);
        console.log(message);

        axios.post('/profile/chat/sendmessage', { 
            message: message, 
            chat_id: chatId,
        })
            .then(function (response) {
                console.log(response);
                // Обработка успешной отправки
                messageInput.value = '';
            })
            .catch(function (error) {
                console.log(error.response);
                // Обработка ошибок
            });
    });


    const chatsMenu = document.querySelector('.chat__contact-wrapper');
    const chatValue = document.getElementById('chatValue');

    function getChatValue(e) {
        e.preventDefault();
        let currentTarget = e.target;
        if (!currentTarget.classList.contains('chat__contact-item')) {
            return;
        }
        
        currentTarget.classList.add('_contact-active')
        chatValue.dataset.chat = currentTarget.dataset.chat;
        chatsMenu.submit();
    }

    chatsMenu.addEventListener('click', getChatValue)
    

})()
