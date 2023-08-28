<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Baptisminfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baptisminfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('childs_name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->text('address');
            $table->integer('no_of_godfather');
            $table->integer('no_of_godmother');
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
        Schema::dropIfExists('baptisminfo');
    }
}
