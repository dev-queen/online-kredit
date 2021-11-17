<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_templates', function (Blueprint $table) {
            $table->id();
            $table->string('links')->nullable();
            $table->string('template');
            $table->string('letter_name')->nullable();
            $table->string('event_type')->nullable();
            $table->integer('delay_time')->nullable();
            $table->string('name');
            $table->smallInteger('is_general')->default(0);
            $table->boolean('active')->nullable();
            $table->string('sending_site')->nullable();
            $table->time('time_from')->nullable();;
            $table->time('time_to')->nullable();;
            $table->smallInteger('check_time_zone')->default(0);


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
        Schema::dropIfExists('sms_templates');
    }
}
