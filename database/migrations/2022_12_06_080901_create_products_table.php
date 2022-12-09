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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('product_cd', 10)->nullable()->comment('Product Code');
            $table->string('product_nm', 255)->nullable()->comment('Product Name');
            $table->integer('category_id')->nullable()->comment('Category ID');
            $table->string('title', 255)->nullable()->comment('Title');
            $table->float('price')->nullable()->comment('Price');
            $table->string('color', 255)->nullable()->comment('Color');
            $table->tinyInteger('is_new_product')->default(0)->comment('Is new product or not');
            $table->string('size', 5)->nullable()->comment('Size');
            $table->string('image', 255)->nullable()->comment('Image');
            $table->float('discount')->nullable()->comment('Discount');
            $table->index('category_id');
            $table->timestamps();
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};