<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Tag::query()->count()) {
            Tag::query()->insert($this->data());
        }
    }

    protected function data(): array
    {
        return [
            ['id' => 1, 'name' => 'Детские программы', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Инклюзивные программы', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Серебряный возраст', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Просветительские программы', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Досуговая программа', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Научно-исследовательская деятельность', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Информационная деятельность', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Волонтерская программа', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Наставничество', 'created_at' => now(), 'updated_at' => now()]
        ];
    }
}
