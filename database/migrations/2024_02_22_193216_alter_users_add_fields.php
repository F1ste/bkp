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
        if (Schema::hasColumn('users', 'fio')) {
            Schema::table('users', function (Blueprint $table) {
                // $table->string('name')->nullable()->change();
                $table->dropColumn('fio');
                $table->string('patronymic')->nullable()->after('avatar');
                $table->string('first_name')->nullable()->after('avatar');
                $table->string('surname')->nullable()->after('avatar');
                $table->string('napr')->nullable()->after('facebook_auth');
                $table->string('portfol')->nullable()->after('facebook_auth');
                $table->string('telegram')->nullable()->after('facebook_auth');
                $table->string('sait')->nullable()->after('facebook_auth');
                $table->string('dpl')->nullable()->after('facebook_auth');
                $table->string('tel_org')->nullable()->after('facebook_auth');
                $table->string('ruk')->nullable()->after('facebook_auth');
                $table->string('inn')->nullable()->after('facebook_auth');
                $table->string('org')->nullable()->after('facebook_auth');
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
        Schema::table('users', function (Blueprint $table) {
            // $table->string('name')->nullable(false)->change();
            $table->string('fio')->nullable()->after('avatar');
            $table->dropColumn([
                'patronymic',
                'first_name',
                'surname',
                'napr',
                'portfol',
                'telegram',
                'sait',
                'dpl',
                'tel_org',
                'ruk',
                'inn',
                'org'
            ]);
        });
    }
};
