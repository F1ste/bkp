(() => {

    const images = document.querySelectorAll('.slider .slider-track img');
    const sliderLine = document.querySelector('.slider .slider-track');

    if(!images || !sliderLine) return false

    let count = 0;
    let width;

    function init() {
        width = document.querySelector('.slider').offsetWidth;
        sliderLine.style.width = width * images.length + 'px';
        images.forEach(item => {
            item.style.width = width + 'px';
            item.style.height = '700';
        });
        rollSlider();
    }

    init();

    window.addEventListener('resize', init);

    document.querySelector('.next').addEventListener('click', function () {
        count++;
        if (count >= images.length) {
            count = 0;
        }
        rollSlider();
    });

    document.querySelector('.prev').addEventListener('click', function () {
        count--;
        if (count < 0) {
            count = images.length - 1;
        }
        rollSlider();
    });

    function rollSlider() {
        sliderLine.style.transform = 'translate(-' + count * width + 'px)';
    }

})()
