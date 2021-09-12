<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_product_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_id')->nullable();
            $table->foreign('sell_id')->on('sells')->references('id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->on('bottle_sizes')->references('id');
            $table->integer('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('subtotal')->nullable();
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
        Schema::dropIfExists('sell_product_lists');
    }
}
