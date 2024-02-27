<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('adminadmin'),
            'surname' => 'Админов',
            'first_name' => 'Василий',
            'patronimyc' => 'Джеймсонович',
            'city' => 'Ростов-на-Дону',
            'phone' => '8 800 555 35 35',
            'twitter' => 'https://x.com/root',
            'youtube' => 'https://youtube.com/index',
            'vk' => 'https://vk.com/id0?hello',
            'facebook' => 'https://facebook.com/root',
            'about' => 'Главный администратор всего тестового окружения.',
            'google_auth' => null,
            'facebook_auth' => null,
            'org' => 'ООО "Домашние деньги"',
            'inn' => '7714699186',
            'ruk' => 'Непонятное поле',
            'tel_org' => '88005553535',
            'dpl' => 'Непонятное поле',
            'sait' => 'https://ya.ru',
            'telegram' => 'https://t.me/this_page_does_not_exist',
            'portfolio' => 'Лучшее',
            'napr' => 'Непонятное поле',
            'rating' => 10,
        ]);
    }
}
