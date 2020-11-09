<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->bigIncrements('shipping_id');
            $table->string('email',30);
            $table->string('company_name',30);
            $table->string('fname',25);
            $table->string('lname',25);
            $table->string('address1',35);
            $table->string('address2',35);
            $table->string('mobile_number',15);
            $table->string('notes',100);
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
        Schema::dropIfExists('shippings');
    }
}
