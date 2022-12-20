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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('username', 255)->nullable()->comment('User Name');
            $table->string('password', 255)->nullable()->comment('Password');
            $table->tinyInteger('role')->nullable()->comment('Role. 1: Admin; 2: User');
            $table->string('name', 255)->nullable()->comment('Name');
            $table->string('gmail', 255)->nullable()->comment('Gmail');
            $table->string('address', 255)->nullable()->comment('Address');
            $table->string('phone_number', 255)->nullable()->comment('Phone Number');
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
        Schema::dropIfExists('users');
    }
};
