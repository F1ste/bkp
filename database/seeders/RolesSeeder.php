<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Role::query()->count()) {
            Role::query()->insert($this->data());
        }
    }

    protected function data(): array
    {
        return [
            ['id' => 1, 'name' => 'Волонтер / Стажер', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Эксперт / Консультант', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Исполнитель / Подрядчик', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Соорганизатор / Соавтор', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Меценат / Спонсор', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Спикер', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Артист / Художник', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'СМИ / блогер', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Другое', 'created_at' => now(), 'updated_at' => now()]
        ];
    }
}
