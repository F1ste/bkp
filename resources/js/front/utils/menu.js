(() => {

    const burgerMenu = document.querySelector('.burger-menu');

    if(burgerMenu.length === 0) return false

    const overlay = document.querySelector('.overlay');
    const menuBody = document.querySelector('.menu__body');

    burgerMenu.addEventListener("click",function(e){
        document.body.classList.toggle('_lock');
        burgerMenu.classList.toggle('_active')
        menuBody.classList.toggle('_active')
        overlay.hidden = !overlay.hidden
    })

})()
