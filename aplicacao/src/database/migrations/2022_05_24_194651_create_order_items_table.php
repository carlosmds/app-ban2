<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // order_id
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders');
            // game_id
            $table->unsignedBigInteger('game_id')->index();
            $table->foreign('game_id')->references('id')->on('games');
            // [purchase_id]
            $table->unsignedBigInteger('purchase_id')->index()->nullable();
            $table->foreign('purchase_id')->references('id')->on('purchases');
            // [rental_id]
            $table->unsignedBigInteger('rental_id')->index()->nullable();
            $table->foreign('rental_id')->references('id')->on('rentals');
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
        Schema::dropIfExists('order_items');
    }
}
