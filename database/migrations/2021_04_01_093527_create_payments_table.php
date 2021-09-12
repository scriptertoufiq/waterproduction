<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_id')->nullable();
            $table->foreign('sell_id')->on('sells')->references('id');
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->foreign('staff_id')->on('staff')->references('id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->on('clients')->references('id');
            $table->integer('payment')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
