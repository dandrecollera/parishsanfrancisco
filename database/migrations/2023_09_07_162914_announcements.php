<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Announcements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->string('subject');
            $table->unsignedBigInteger('volunteerid');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('youtube');
            $table->timestamps();

            $table->foreign('volunteerid')->references('id')->on('volunteers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcement');
    }
}
