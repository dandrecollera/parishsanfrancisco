<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('calendar_id');
            $table->string('status');
            $table->string('service');

            $table->unsignedBigInteger('baptism_id')->nullable();
            $table->unsignedBigInteger('funeral_id')->nullable();
            $table->unsignedBigInteger('anointing_id')->nullable();
            $table->unsignedBigInteger('blessing_id')->nullable();
            $table->unsignedBigInteger('kumpil_id')->nullable();
            $table->unsignedBigInteger('communion_id')->nullable();
            $table->unsignedBigInteger('wedding_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('main_users')->onDelete('cascade');
            $table->foreign('calendar_id')->references('id')->on('calendartime')->onDelete('cascade');
            $table->foreign('baptism_id')->references('id')->on('baptisminfo')->onDelete('cascade');
            $table->foreign('funeral_id')->references('id')->on('funeralinfo')->onDelete('cascade');
            $table->foreign('anointing_id')->references('id')->on('anointinginfo')->onDelete('cascade');
            $table->foreign('blessing_id')->references('id')->on('blessinginfo')->onDelete('cascade');
            $table->foreign('kumpil_id')->references('id')->on('kumpilinfo')->onDelete('cascade');
            $table->foreign('communion_id')->references('id')->on('communioninfo')->onDelete('cascade');
            $table->foreign('wedding_id')->references('id')->on('weddinginfo')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
