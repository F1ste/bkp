import axios from "axios";
import {notification} from "../utils/notification";


/* export default function useChat(){

    const messages = [];
    const errors = [];

    const getMessages = async () =>{
        await axios.get('/profile/chat').then((response) => {
            console.log(response);
            messages.value = response.data;
        })
    }

    const addMessage = async (form) =>{
        errors.value = [];

        try {
            await axios.post('/profile/chat', form).then((response) => {
                console.log(response);
                messages.value.push(response.data);
            })
        } catch (error) {
            console.log(error);
        }

    }

    return {
        messages,
        errors,
        getMessages,
        addMessage
    }

} */

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
    const chat_id = 13;
    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault();
        let message = messageInput.value;
        let chatId = messageInput.value;
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
    

})()
