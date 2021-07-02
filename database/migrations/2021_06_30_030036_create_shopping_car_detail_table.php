<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCarDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_car_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('car_id');
            $table->integer('quantity');
            
            $table->foreign('car_id')->references('id')->on('shopping_car');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_car_details');
    }
}
