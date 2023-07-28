<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Priests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('mobilenumber');
            $table->longText('address')->nullable();
            $table->string('position');
            $table->string('conventual');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('priests');
    }
}
