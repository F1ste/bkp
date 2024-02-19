import { isMobile, FLS } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";

// Подключение из node_modules
import tippy from "tippy.js";

// Подключение cтилей из src/scss/libs
import "../../scss/libs/tippy.scss";
// Подключение cтилей из node_modules
//import 'tippy.js/dist/tippy.css';
import "tippy.js/animations/scale-extreme.css";

// Запускаем и добавляем в объект модулей
flsModules.tippy = tippy("[data-tippy-content]", {
    animation: "scale-extreme",
    interactive: true,
    trigger: "mouseenter click",
    offset: [0, 15],
    maxWidth: 659,
});
