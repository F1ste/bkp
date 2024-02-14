<div id="howItWorksPopup" aria-hidden="true" class="popup">

    <div class="popup__wrapper">
        <div class="popup__content">

            <button data-close type="button" class="popup__close"></button>
            <div class="how-it-works-popup__title how-it-works__item-title">
                Как создать проект?
            </div>
            <div class="popup__text how-it-works-popup__text">
                Зарегистрируйтесь на сайте и в личном кабинете нажмите на кнопку «Создать проект».
                Подробную инструкцию можно прочитать в личном кабинете в разделе «Создать проект».
            </div>
        </div>
    </div>
</div>

<script>
    (() => {
        const howItWorksContent = document.querySelector('.how-it-works__content');

        if (!howItWorksContent) {
            return;
        }
        const textData = {
            'Как создать проект?': 'Зарегистрируйтесь на сайте и в личном кабинете нажмите на кнопку «Создать проект».\
            Подробную инструкцию можно прочитать в личном кабинете в разделе «Создать проект».',
            'Как откликнуться на проект?': 'Чтобы отправить отклик на проект, необходимо заполнить сопроводительное\
            письмо на сайте в карточке проекта в разделе «Проекты».',
            'Как работает наш чат?': 'Чат станет доступным, как только организатор ответит на ваш отклик по проекту.\
            Если вы – организатор, тогда вы сможете общаться в чате с теми, кто оставит отклик на ваш проект.',
            'Посмотреть выполненные проекты': 'Все опубликованные проекты можно посмотреть в разделе «Проекты».\
             Это возможно даже без регистрации.',
        };

        const howItWorksItem = document.getElementById('howItWorksPopup');
        const howItWorksTitle = howItWorksItem.querySelector('.how-it-works-popup__title');
        const howItWorksText = howItWorksItem.querySelector('.how-it-works-popup__text');

        function popupDataInsert(e) {
            const clickedItem = e.target.closest('.how-it-works__item');

            if (!clickedItem) {
                return;
            }

            const title = clickedItem.querySelector('.how-it-works__question button').textContent;

            if (textData.hasOwnProperty(title)) {
                howItWorksTitle.textContent = title;
                howItWorksText.innerHTML = textData[title];
            }
        }

        howItWorksContent.addEventListener('click', popupDataInsert);
    })();
</script>