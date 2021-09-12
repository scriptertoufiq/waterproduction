<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestroyedBottlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destroyed_bottles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bottle_id');
            $table->foreign('bottle_id')->references('id')->on('bottles');
            $table->integer('quantity')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('destroyed_bottles');
    }
}
