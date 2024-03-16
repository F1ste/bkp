<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->after('name')->unique()->nullable();
        });

        $slugs = [];
        Project::query()->chunk(100, function ($projects) use ($slugs) {
            foreach ($projects as $project) {
                $slug = $variant = Str::slug($project->name_proj);
                for ($i = 1; in_array($variant, $slugs); $i++) {
                    $variant = $slug . '-' . $i;
                }
                $project->slug = $variant;
                $slugs[] = $variant;
                $project->save();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
