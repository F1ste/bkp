import axios from "axios";
import { notification } from "../utils/notification";

(() => {
    const setting = document.getElementById("setting");

    if (!setting) return false;

    const updateRoute = setting.dataset.update,
        avatarUpdateRoute = setting.dataset.avatar;

    const select = {
        update: "update",
        surname: "surname",
        firstname: "first-name",
        city: "city",
        phone: "phone",
        youtube: "youtube",
        vk: "vk",
        about: "about",
        org: "org",
        ruk: "ruk",
        inn: "inn",
        napr: "napr",
        tel_org: "tel_org",
        sait: "sait",
        telegram: "telegram",
        dpl: "dpl",
        name: "name",
        email: "email",
        portfol: "portfol",
    };

    document.getElementById(select.update).addEventListener("click", (e) => {
        const surname = document.getElementById(select.surname).value,
            firstname = document.getElementById(select.firstname).value,
            city = document.getElementById(select.city).value,
            phone = document.getElementById(select.phone).value,
            youtube = document.getElementById(select.youtube).value,
            vk = document.getElementById(select.vk).value,
            about = document.getElementById(select.about).value,
            org = document.getElementById(select.org).value,
            ruk = document.getElementById(select.ruk).value,
            inn = document.getElementById(select.inn).value,
            napr = document.getElementById(select.napr).value,
            tel_org = document.getElementById(select.tel_org).value,
            sait = document.getElementById(select.sait).value,
            telegram = document.getElementById(select.telegram).value,
            dpl = document.getElementById(select.dpl).value,
            name = document.getElementById(select.name).value,
            email = document.getElementById(select.email).value,
            portfol = document.getElementById(select.portfol).value;

        document.getElementById(select.update).innerHTML = `Подождите...`;

        axios
            .post(updateRoute, {
                surname: surname,
                firstname: firstname,
                city: city,
                phone: phone,
                youtube: youtube,
                vk: vk,
                about: about,
                org: org,
                ruk: ruk,
                inn: inn,
                napr: napr,
                tel_org: tel_org,
                sait: sait,
                telegram: telegram,
                dpl: dpl,
                name: name,
                email: email,
                portfol: portfol,
            })
            .then((e) => {
                document.getElementById(select.update).innerHTML = `Обновить`;
                notification("Данные обновлены");
            })
            .catch((error) => {
                console.log(error.response);
                notification("Ошибка...", "Попробуйте позже...");
            });
    });
})();
