<?php

use App\Models\File;
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
        Project::query()->with('files')->chunk(100, function ($projects) {
            /** @var Project $project */
            foreach ($projects as $project) {
                foreach (['img1', 'img2', 'img3', 'img4', 'img5', 'img6'] as $image) {
                    $path = public_path($project->{$image} ?? '');
                    $filedata = $this->getFileData($path);

                    if (is_null($filedata)) {
                        continue;
                    }

                    $existed_model = File::where('hash', $filedata['hash'])->first();

                    if ($image == 'img1') {
                        $model = $existed_model ?? File::create($filedata);
                        $project->file_id = $model->uuid;
                        $project->save();
                    } elseif ($existed_model) {
                        $project->files()->attach($existed_model->uuid);
                    } else {
                        $model = $project->files()->create($filedata);
                    }

                    if ($existed_model) {
                        \Illuminate\Support\Facades\File::delete($path);
                    } else {
                        \Illuminate\Support\Facades\File::move($path, public_path($model->path));
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
                $project->img1 = $project->image->path ?? null;

                $index = 2;
                foreach ($project->files as $file) {
                    $key = 'img' . $index;
                    $project->{$key} = $file->path;
                    $index++;
                }

                $project->save();
            }
        });
    }

    protected function getFileData(?string $path): ?array
    {
        if (empty($path) || ! file_exists($path) || ! is_file($path)) {
            return null;
        }

        $name = basename($path);
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($path);
        $hash = hash_file('md5', $path);

        return compact('name', 'extension', 'mimetype', 'hash');
    }
};
