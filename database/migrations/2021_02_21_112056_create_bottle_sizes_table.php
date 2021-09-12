<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBottleSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bottle_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });


        DB::table('bottle_sizes')->insert([
            [
                'name' => 'Half LTR',
                'size' => '.5',
            ],
            [
                'name' => 'One LTR',
                'size' => '1',
            ],
            [
                'name' => 'Two LTR',
                'size' => '2',
            ],
            [
                'name' => 'Five LTR',
                'size' => '5',
            ],
            [
                'name' => 'Ten LTR',
                'size' => '10',
            ],
            [
                'name' => 'Tweenty LTR',
                'size' => '20',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bottle_sizes');
    }
}
