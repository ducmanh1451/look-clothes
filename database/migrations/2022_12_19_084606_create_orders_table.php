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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('user_id')->nullable()->comment('User ID');
            $table->decimal('total_money', 9, 2)->nullable()->comment('Total money');
            $table->string('name', 255)->nullable()->comment('Name');
            $table->string('phone_number', 15)->nullable()->comment('Phone Number');
            $table->string('email', 255)->nullable()->comment('Email');
            $table->string('address', 255)->nullable()->comment('Address');
            $table->string('province', 255)->nullable()->comment('Province');
            $table->string('district', 255)->nullable()->comment('District');
            $table->string('ward', 255)->nullable()->comment('Ward');
            $table->string('product_json', 500)->nullable()->comment('Product List Information');
            $table->string('remark', 255)->nullable()->comment('Remark');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('orders');
    }
};
