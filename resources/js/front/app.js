import { notification } from "./utils/notification";
import "./collection/collection-store";
import "./collection/collection-edit";

import "./collection/admin-collection-edit";

import "./news/news-store";
import "./news/news-edit";

import "./setting/setting";

import "./banner/store";
import "./banner/edit";

import "./about/edit";

import "./contacts/edit";

import "./feedback/edit";
import "./feedback/changestatus";

import "./faq/create";
import "./faq/edit";

import "./fdesc/create";
import "./fdesc/edit";

import "./ficon/create";
import "./ficon/edit";

import "./fpage/create";
import "./fpage/edit";

import "./chat/chat";

import "./external-links";

import "./modal";
import "./help-form";


(() => {
    const toastMessage = JSON.parse(localStorage.getItem('toastMessage'));
    
    if (toastMessage) {
        notification(toastMessage.description, toastMessage.type);
        localStorage.removeItem('toastMessage');
    }

    if (window?.sess?.sessionData) {
        notification(window?.sess?.sessionData, 'success');
    }
})()
