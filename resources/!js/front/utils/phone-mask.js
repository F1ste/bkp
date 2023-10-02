import IMask from 'imask';

(() => {

    const phone = document.getElementById('phone')

    if(!phone) return false

    const phoneMask = IMask(phone, {
        mask: '+{7} (000) 000-00-00'
    });

})()
