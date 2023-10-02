(() => {
    
    const servicesContent = document.querySelector('.formini');

    if(!servicesContent) {
        return
    }

    const servicesItems = servicesContent.querySelectorAll('.collection-miniitems');

    const forBigBlock = document.querySelector('.forbig');
    const forBigImg = forBigBlock.querySelector('.collection-slider img');
    const forBigServicesName = forBigBlock.querySelector('.services__name');
    const forBigDateFrom = forBigBlock.querySelector('.services__date-from');
    const forBigDateTo = forBigBlock.querySelector('.services__date-to');
    const forBigPrice = forBigBlock.querySelector('.services__price');
    const forBigDiscription = forBigBlock.querySelector('.services__description');

    function serviceToggler(e) {
        e.preventDefault();
        const clickedItem = e.target.closest('.collection-miniitems');

        if (!clickedItem) {
            return;
        }



        const serviceImg = clickedItem.querySelector('img').src;
        const serviceName = clickedItem.querySelector('.name').textContent;
        const serviceDateFrom = clickedItem.querySelector('.date-from').textContent;
        const serviceDateTo = clickedItem.querySelector('.date-to').textContent;
        const servicePrice = clickedItem.querySelector('.price').textContent;
        const serviceDescription = clickedItem.querySelector('.description').textContent;

        forBigImg.src = serviceImg;
        forBigServicesName.textContent = serviceName;
        forBigDateFrom.textContent = serviceDateFrom;
        forBigDateTo.textContent = serviceDateTo;
        forBigPrice.textContent = servicePrice + ' ₽';
        forBigDiscription.textContent = serviceDescription;

        const allItems = document.querySelectorAll('._service-active');

        allItems.forEach(item => item.classList.remove('_service-active'));
        
        clickedItem.classList.toggle('_service-active');
    }


    
    servicesContent.addEventListener('click', serviceToggler)

    document.addEventListener('DOMContentLoaded', function() {
        const serviceItem = servicesContent.querySelector('.collection-miniitems');
        
        if (serviceItem) {
            serviceItem.click();
        }
    });

})()