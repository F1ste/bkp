<?php

namespace Tests\Feature\ResponseCodes;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function testNewsIndexEmpty()
    {
        $this->get('/news')->assertOk();
    }

    public function testNewsIndexPage1()
    {
        News::factory()->count(35)->make();
        $this->get('/news')->assertOk();
    }

    public function testNewsIndexPage2()
    {
        News::factory()->count(35)->make();
        $this->get('/news?page=2')->assertOk();
    }

    public function testNewsShow()
    {
        News::factory()->create();
        $this->get('/news/news/1')->assertOk();
    }
}
