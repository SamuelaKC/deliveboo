<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_plate', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('plate_id');
            $table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('ingredient_plate');
    }
}