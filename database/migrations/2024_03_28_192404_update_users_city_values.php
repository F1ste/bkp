<?php

use App\Models\User;
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
        User::where('city', '2')->update(['city' => '42']);
        User::where('city', '3')->update(['city' => '59']);
        User::where('city', '4')->update(['city' => '15']);
        User::whereNotIn('city', ['42', '59', '15'])->update(['city' => null]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::whereNotIn('city', ['42', '59', '15'])->update(['city' => null]);
        User::where('city', '42')->update(['city' => '2']);
        User::where('city', '59')->update(['city' => '3']);
        User::where('city', '15')->update(['city' => '4']);
    }
};
