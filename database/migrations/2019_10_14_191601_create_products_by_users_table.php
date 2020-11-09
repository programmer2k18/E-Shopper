<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsByUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_by_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name',60);
            $table->string('description',200);
            $table->string('selling_address',100);
            $table->bigInteger('user_id');
            $table->string('user_name');
            $table->string('colors',50);
            $table->string('sizes',50);
            $table->string('currency',12);
            $table->string('tags',60);
            $table->string('image',120);
            $table->string('category',50);
            $table->string('status',5);
            $table->string('publication_status',12);
            $table->integer('price');
            $table->integer('quantity');
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
        Schema::dropIfExists('products_by_users');
    }
}
