<?php

namespace Tests\Feature\ResponseCodes;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsRoutesTest extends TestCase
{
    use RefreshDatabase;

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
        $project = Project::factory()->create();
        $this->get('/projects/' . $project->slug)->assertOk();
    }

    public function testProjectShowRedirectFriendlyUrl()
    {
        $project = Project::factory()->create();
        $this->get('/projects/project/' . $project->id)->assertRedirectToRoute('projects.project', [$project]);
    }
}
