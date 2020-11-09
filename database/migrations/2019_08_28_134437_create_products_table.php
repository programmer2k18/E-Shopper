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
            $table->bigIncrements('id');
            $table->bigInteger('category_id');
            $table->bigInteger('brand_id');
            $table->bigInteger('seller_id');
            $table->mediumText('description');
            $table->string('name',50);
            $table->string('image');
            $table->string('color');
            $table->float('price');
            $table->string('currency',10);
            $table->string('size');
            $table->string('status',10);
            $table->integer('quantity');
            $table->integer('publication_status')->default(null);
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
