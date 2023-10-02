<div class="connection__container">
    <h2 class="tittle-text">Связаться с {{ auth()->user()->first_name }}</h2>
    <form id="contact" data-email="" action="">
        <div>
            <p>Напишите свой запрос</p>
            <input type="textarea" id="description">
            <p>Доступно только зарегестрированным пользователям</p>
            <button class="btn btn-connection">Отправить</button>
        </div>
    </form>
</div>
