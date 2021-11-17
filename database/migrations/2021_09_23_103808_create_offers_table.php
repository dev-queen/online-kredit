<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('logo')->nullable();
            $table->integer('sum')->nullable();
            $table->integer('age')->nullable();
            $table->integer('sort')->nullable();
            $table->string('color')->nullable()->default('#FF69B4');
            $table->string('dice_text')->nullable();
            $table->string('text_button')->nullable();
            $table->string('color_for_dice')->nullable()->default('#FF69B4');
            $table->string('quality')->nullable();
            $table->integer('rating')->nullable();
            $table->boolean('display')->nullable();
            $table->unsignedBigInteger('id_showcase');
           $table->foreign('id_showcase')->references('id')->on('show_cases')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
