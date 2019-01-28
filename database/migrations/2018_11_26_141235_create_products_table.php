<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->longtext('description_ar');
            $table->string('name_en')->nullable();
            $table->longtext('description_en')->nullable();
            $table->string('color')->nullable();
            $table->string('image');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('tags_ar')->nullable();
            $table->string('tags_en')->nullable();
            $table->float('price');
            $table->float('offer')->nullable();
            $table->string('size')->nullable();
            $table->string('volume')->nullable();
            $table->string('rate')->nullable();
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
        Schema::dropIfExists('products');
    }
}
