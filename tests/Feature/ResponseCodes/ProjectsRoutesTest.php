<?php

namespace Tests\Feature\ResponseCodes;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsRoutesTest extends TestCase
{
    public function testProjectsIndexEmpty()
    {
        $this->get('/projects')->assertOk();
    }

    public function testProjectsIndexPage1()
    {
        Project::factory()->count(35)->make();
        $this->get('/projects')->assertOk();
    }

    public function testProjectsIndexPage2()
    {
        Project::factory()->count(35)->make();
        $this->get('/projects?page=2')->assertOk();
    }

    public function testProjectShow()
    {
        Project::factory()->create();
        $this->get('/projects/project/1')->assertOk();
    }
}
