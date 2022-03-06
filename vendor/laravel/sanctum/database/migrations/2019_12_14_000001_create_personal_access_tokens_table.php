<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
=======
<<<<<<<< HEAD:database/migrations/2014_10_12_000000_create_users_table.php
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
========
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
>>>>>>> 0af18872 ([PHP_CodeSniffer] Apply coding standard and update):vendor/laravel/sanctum/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
<<<<<<< HEAD:database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
=======
>>>>>>>> 0af18872 ([PHP_CodeSniffer] Apply coding standard and update):vendor/laravel/sanctum/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
>>>>>>> 0af18872 ([PHP_CodeSniffer] Apply coding standard and update):vendor/laravel/sanctum/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
}
