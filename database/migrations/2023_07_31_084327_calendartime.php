<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Calendartime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendartime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('year');
            $table->unsignedBigInteger('month');
            $table->unsignedBigInteger('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('service');
            $table->string('event_type')->default('regular');
            $table->unsignedBigInteger('slot')->default(1);

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
        Schema::dropIfExists('calendartime');
    }
}
