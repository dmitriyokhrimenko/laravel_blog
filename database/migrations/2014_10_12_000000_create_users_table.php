<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('role')->nullable($value = true);
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('surname')->nullable($value = true);
            $table->string('city')->nullable($value = true);
            $table->string('country')->nullable($value = true);
            $table->string('age')->nullable($value = true);
            $table->string('telephone')->nullable($value = true);
            $table->string('photo')->nullable($value = true);
            $table->rememberToken();
            $table->timestamps();
        });
        Artisan::call('db:seed');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
