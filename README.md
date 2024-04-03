<p align="center"><a href="https://culturexchange.ru" target="_blank"><img src="https://culturexchange.ru/image/logo-with-text.png" width="400"></a></p>

## Разворот проекта

- Убедиться, что установлены php, composer, npm
- Стандартный разворот проекта:
  - Клонировать репозиторий
  - Скопировать .env.example и .env
  - Заполнить данные для подключения к базе
  - Выполнить команды
    ```bash
    composer install
    # npm для локального окружения
    npm install
    php artisan key:generate
    php artisan migrate
    ```
- [Установить и настроить Meilisearch](https://www.meilisearch.com/docs/learn/cookbooks/running_production)
- Добавить параметры Meilisearch в .env (см. инструкцию выше)
