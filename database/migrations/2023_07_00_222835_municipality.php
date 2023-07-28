<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Municipality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipality', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('province_id');
            $table->string('municipality_name');

            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipality');
    }
}
