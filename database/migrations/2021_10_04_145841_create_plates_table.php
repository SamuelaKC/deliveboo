<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description')->nullable();
            $table->double('price', 8, 2);
            $table->boolean('available');
            $table->text('picture');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); //tabella users
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories'); //tabella category
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
        Schema::dropIfExists('plates');
    }
}