<?php

namespace Tests\Feature\app\Models;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGlavSingleton()
    {
        // Создаем три новости
        $news1 = News::factory()->create(['glav' => 1]);
        $news2 = News::factory()->create(['glav' => 0]);
        $news3 = News::factory()->create(['glav' => 0]);

        // Убеждаемся, что у одной новости значение glav равно 1
        $news_count = News::where('glav', 1)->count();
        $this->assertEquals(1, $news_count);

        // Пытаемся установить значение glav для второй новости в 1
        $news2->update(['glav' => 1]);

        // Проверяем, что теперь только одна новость имеет значение glav равное 1
        $news_count = News::where('glav', 1)->count();
        $this->assertEquals(1, $news_count);
    }

    public function testPozitsSingleton()
    {
        // Создаем три новости
        $news1 = News::factory()->create(['pozits' => 1]);
        $news2 = News::factory()->create(['pozits' => 0]);
        $news3 = News::factory()->create(['pozits' => 0]);

        // Убеждаемся, что у одной новости значение pozits равно 1
        $news_count = News::where('pozits', 1)->count();
        $this->assertEquals(1, $news_count);

        // Пытаемся установить значение pozits для второй новости в 1
        $news2->update(['pozits' => 1]);

        // Проверяем, что теперь только одна новость имеет значение pozits равное 1
        $news_count = News::where('pozits', 1)->count();
        $this->assertEquals(1, $news_count);
    }
}
