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
        Schema::create('warehouse', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('product_id')->nullable()->comment('Product ID');
            $table->integer('color_id')->nullable()->comment('Color ID');
            $table->integer('size_id')->nullable()->comment('Size ID');
            $table->integer('quantity')->nullable()->comment('Quantity');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products');
            $table
                ->foreign('color_id')
                ->references('id')
                ->on('colors');
            $table
                ->foreign('size_id')
                ->references('id')
                ->on('sizes');
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
        Schema::dropIfExists('warehouse');
    }
};
