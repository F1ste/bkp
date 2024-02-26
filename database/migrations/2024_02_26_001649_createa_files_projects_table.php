<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_projects', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained();
            $table->foreignId('file_id')->constrained();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreignUlid('image')->constrained('files', 'ulid')->nullable()->after('user_id');
        });

        Project::query()->with('files')->chunk(100, function ($projects) {
            foreach ($projects as $project) {
                foreach (['img1', 'img2', 'img3', 'img4', 'img5', 'img6'] as $image) {
                    $path = $project->{$image};
                    $filedata = $this->getFileData($path);

                    if (is_null($filedata)) {
                        continue;
                    }

                    if ($image == 'img1') {
                        $file = File::create($filedata);
                        $project->update(['image' => $file->ulid]);
                    } else {
                        $project->files()->create(compact('name', 'extension', 'mimetype'));
                    }
                }
            }
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('img1');
            $table->dropColumn('img2');
            $table->dropColumn('img3');
            $table->dropColumn('img4');
            $table->dropColumn('img5');
            $table->dropColumn('img6');
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
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
            $table->string('img5')->nullable();
            $table->string('img6')->nullable();
        });

        Project::query()->with('files')->chunk(100, function ($projects) {
            foreach ($projects as $project) {
                $project->img1 = $project->image()->path;

                $index = 2;
                foreach ($project->files as $file) {
                    $key = 'img' . $index;
                    $project->{$key} = $file->path;
                }

                $project->save();
            }
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['image']);
            $table->dropColumn('image');
        });

        Schema::dropIfExists('files_projects');
    }

    protected function getFileData(string $path): ?array
    {
        if (empty($path) || ! file_exists($path) || ! is_file($path)) {
            return null;
        }

        $name = basename($path);
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($path);

        return compact('name', 'extension', 'mimetype');
    }
};
