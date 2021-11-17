<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_logs', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->integer('time')->nullable();
            $table->string('status')->length(255)->nullable();
            $table->integer('template_id')->length(11)->default(0);;
            $table->integer('user_id')->length(11)->nullable();
            $table->integer('delay')->length(11)->nullable();
            $table->string('type')->length(255)->default(0);;
            $table->string('phone')->length(50)->default(0);;
            $table->string('letter_name')->length(255)->nullable();
            $table->integer('cron_id')->length(11)->default(0);;
            $table->string('delay_timezone')->length(255)->nullable();
            $table->string('timezone')->length(255)->nullable();
            $table->integer('cascade')->length(11)->default(0);
            $table->integer('send_time')->nullable();

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
        Schema::dropIfExists('event_logs');
    }
}
