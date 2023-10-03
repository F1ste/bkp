<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            "description"=>"Общие вопросы
            info@culturalforum.ru
            Для представителей СМИ
            media@culturalforum.ru
            Вопросы по программе
            programme@culturalforum.ru"
        ]);
    }
}
