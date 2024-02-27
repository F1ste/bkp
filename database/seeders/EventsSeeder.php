<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Event::query()->count()) {
            Event::query()->insert($this->data());
        }
    }

    protected function data(): array
    {
        return [
            ['id' => 1, 'name' => 'Выставка', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Концерт', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Спектакль', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Фестиваль', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Аудиовизуальная инсталляция', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Интерактивная игра', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Кинопоказ', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Мероприятие СМИ', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Форум', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Перформанс', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Съемки программы / передачи', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Ток-шоу', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'Экскурсия', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Дискуссия', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'Конференция', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'name' => 'Круглый стол', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'name' => 'Публичные чтения', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'name' => 'Пленарное заседание', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'name' => 'Подписание соглашения', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'name' => 'Презентация', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'name' => 'Симпозиум', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'name' => 'Церемония', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'name' => 'Лекция', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'name' => 'Мастер-класс', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'name' => 'Публичные чтения', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'name' => 'Паблик-ток', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'name' => 'Семинар', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'name' => 'Творческая встреча', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'name' => 'Шоу-кейс', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'name' => 'Другое', 'created_at' => now(), 'updated_at' => now()]
        ];
    }
}
