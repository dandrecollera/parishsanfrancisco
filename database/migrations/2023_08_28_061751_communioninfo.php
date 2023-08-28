<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Communioninfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communioninfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('principal');
            $table->string('secretary');
            $table->string('address');
            $table->integer('total_student');
            $table->integer('no_of_male');
            $table->integer('no_of_female');
            $table->string('requirement');
            $table->decimal('payment', 10, 2);
            $table->string('paymentimage');
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
        Schema::dropIfExists('communioninfo');
    }
}
