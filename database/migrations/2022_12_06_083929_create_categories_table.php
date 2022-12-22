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
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('category_nm', 255)->nullable()->comment('Category Name');
            $table->integer('category_parent_id')->nullable()->comment('Category Parent ID');
            $table->index('category_parent_id');
            $table->timestamps();
            $table
                ->foreign('category_parent_id')
                ->references('id')
                ->on('category_parents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
