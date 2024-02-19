import axios from "axios";
import { notification } from "../utils/notification";

(() => {
    const chat = document.getElementById("personal-chat");

    if (!chat) return false;

    let pusher = new Pusher("c8811e977d93532dcb3a", {
        cluster: "eu",
        encrypted: true,
    });

    const messageInput = document.getElementById("chatInput");

    const dialogueBlock = document.querySelector(".chat__dialogue");
    if (dialogueBlock) {
        const messageInput = document.getElementById("chatInput");

        const firstId = dialogueBlock.dataset.first_user;
        const secondId = dialogueBlock.dataset.second_user;

        let channel = pusher.subscribe(`store_chat_${firstId}_${secondId}`);
        channel.bind("store_chat", (data) => {
            if (data.user_id.original !== messageInput.dataset.user) {
                axios
                    .get("/profile/chat/getmessage", {
                        params: {
                            message: data.message.original,
                            chat_id: data.chat_id.original,
                            user_id: data.user_id.original,
                        },
                    })
                    .then(function (response) {
                        let messageData = response.data;
                        let newMessageElement = document.createElement("div");

                        newMessageElement.innerHTML = `
                        <div class="chat__msg-stack _msg-from">
                            <div class="chat__stack-photo">
                            <div class="chat__stack-media media-block">
                            <picture><source srcset="/image/chat/default.jpg" type="image/webp"><img src="/image/chat/default.jpg" alt="Изображение пользователя"></picture>
                        </div>
                            </div>
                            <div class="chat__stack-content">
                                <div class="chat__stack-info">
                                    <div class="chat__stack-date chat-date">
                                        ${messageData.created_at}
                                    </div>
                                </div>
                                <div class="chat__stack-message">
                                    <div class="chat__message-text">
                                        ${messageData.message}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                        let chatContainer =
                            document.querySelector(".chat__chat-body");
                        chatContainer.appendChild(newMessageElement);

                        messageInput.value = "";
                    })
                    .catch(function (error) {
                        console.log(error.response);
                    });
            }

            /*             console.log(
                `Event store_chat was triggered with data: ${JSON.stringify(data)}`
            ); */
        });
    }

    if (messageInput) {
        document
            .getElementById("chat-form")
            .addEventListener("submit", function (e) {
                e.preventDefault();
                let message = messageInput.value;
                let userId = messageInput.dataset.user;
                let currentURL = window.location.href;
                let queryString = currentURL.split("?")[1];
                let queryParams = queryString.split("&");
                let chatId = null;
                for (let i = 0; i < queryParams.length; i++) {
                    let param = queryParams[i].split("=");
                    if (param[0] === "id") {
                        chatId = param[1];
                        break;
                    }
                }

                axios
                    .post("/profile/chat/sendmessage", {
                        message: message,
                        chat_id: chatId,
                        user_id: userId,
                    })
                    .then(function (response) {
                        let messageData = response.data;
                        let newMessageElement = document.createElement("div");

                        newMessageElement.innerHTML = `
                        <div class="chat__msg-stack _msg-to">
                            <div class="chat__stack-photo">
                            </div>
                            <div class="chat__stack-content">
                                <div class="chat__stack-info">
                                    <div class="chat__stack-date chat-date">
                                    ${messageData.created_at}
                                    </div>
                                </div>
                                <div class="chat__stack-message">
                                    <div class="chat__message-text">
                                        ${messageData.message}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                        let chatContainer =
                            document.querySelector(".chat__chat-body");
                        chatContainer.appendChild(newMessageElement);

                        messageInput.value = "";
                    })
                    .catch(function (error) {
                        console.log(error.response);
                    });
            });
    }

    const chatsMenu = document.querySelector(".chat__contact-wrapper");
    const chatValue = document.getElementById("chatValue");

    function getChatValue(e) {
        e.preventDefault();
        let currentTarget = e.target;
        if (!currentTarget.classList.contains("chat__contact-item")) {
            return;
        }

        /*         currentTarget.classList.add('_contact-active'); */
        chatValue.value = currentTarget.dataset.chat;

        chatsMenu.submit();
    }

    chatsMenu.addEventListener("click", getChatValue);
    function scrollToLastMessage() {
        const chatContainer = document.querySelector(".chat__chat-body");
        if (!chatContainer) return;
        const lastMessage = chatContainer.lastElementChild;

        if (lastMessage) {
            chatContainer.scrollTop = lastMessage.offsetTop;
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        scrollToLastMessage();
    });
})();
