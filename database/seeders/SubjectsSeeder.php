<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Subject::query()->count()) {
            Subject::query()->insert($this->data());
        }
    }

    protected function data(): array
    {
        return [
            ['id' => 1, 'name' => 'Литература', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Музыка', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Визуальные искусства', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Архитектура', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Балет и танец', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Драмтеатр', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Кино', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Цирк', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Опера', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Междисциплинарные проекты', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Дизайн', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Другое', 'created_at' => now(), 'updated_at' => now()]
        ];
    }
}
