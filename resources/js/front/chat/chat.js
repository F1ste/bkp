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
    channel.bind('App\\Events\\StoreChatEvent', function(data) {
        // Обработка приходящего сообщения
        console.log(data.message);
        // Отобразите сообщение на странице
    });

    const messageInput = document.getElementById('chatInput');
    const userId = 
    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault();
        let message = messageInput.value;

        console.log(message);

        axios.post('/profile/chat', { message: message })
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
