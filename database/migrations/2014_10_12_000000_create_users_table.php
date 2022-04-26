<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->boolean('statusenable')->default(1);
            $table->enum('lev', ['root', 'admin', 'general'])->default('general');
            $table->enum('gender', ['male', 'female', 'notdefined'])->default('notdefined');
            $table->string('address')->nullable();
            $table->string('telp')->nullable();
            $table->string('enterprise')->nullable();
            $table->string('position')->nullable();
            $table->string('photo')->nullable();
        });
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
