<?php

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
        if (! Schema::hasTable('news')) {
            Schema::create('news', function (Blueprint $table) {
                $table->integer('id', true);
                $table->text('name')->nullable();
                $table->text('pod_text')->nullable();
                $table->text('text')->nullable();
                $table->date('date')->nullable();
                $table->text('img')->nullable();
                $table->text('updated_at');
                $table->text('created_at');
                $table->string('project')->nullable();
                $table->string('rubrica')->nullable();
                $table->string('banner')->nullable();
                $table->string('glav')->nullable();
                $table->string('pozits')->nullable();
                $table->string('img2')->nullable();
                $table->string('img3')->nullable();
                $table->string('img4')->nullable();
                $table->string('img5')->nullable();
                $table->string('img6')->nullable();
                $table->string('video')->nullable();
                $table->string('img7')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
