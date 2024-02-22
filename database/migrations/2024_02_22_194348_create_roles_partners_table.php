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
        if (! Schema::hasTable('roles_partners')) {
            Schema::create('roles_partners', function (Blueprint $table) {
                $table->integer('id', true);
                $table->string('name');
                $table->timestamp('created_at');
                $table->timestamp('updated_at');
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
        Schema::dropIfExists('roles_partner');
    }
};
