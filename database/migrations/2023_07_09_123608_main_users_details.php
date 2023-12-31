<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MainUsersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_users_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userid');
            $table->string('username');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('gender');
            $table->unsignedBigInteger('province');
            $table->unsignedBigInteger('municipality');
            $table->string('mobilenumber');
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('main_users')->onDelete('cascade');
            $table->foreign('province')->references('id')->on('province');
            $table->foreign('municipality')->references('id')->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_users_details');
    }
}
