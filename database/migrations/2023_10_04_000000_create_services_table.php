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
        if (! Schema::hasTable('projects') && ! Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('user_id');
                $table->string('name');
                $table->json('images');
                $table->text('excerpt')->nullable();
                $table->date('date_service_from')->nullable();
                $table->date('date_service_to')->nullable();
                $table->string('price')->nullable();
                $table->timestamps();
                $table->text('region')->nullable();
                $table->text('tip')->nullable();
                $table->json('teg')->nullable();
                $table->text('tema')->nullable();
                $table->text('tel')->nullable();
                $table->text('email')->nullable();
                $table->text('name_proj')->nullable();
                $table->text('video')->nullable();
                $table->text('serch')->nullable();
                $table->string('img1')->nullable();
                $table->string('img2')->nullable();
                $table->string('img3')->nullable();
                $table->string('img4')->nullable();
                $table->string('img5')->nullable();
                $table->string('img6')->nullable();
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
        Schema::dropIfExists('services');
    }
};
