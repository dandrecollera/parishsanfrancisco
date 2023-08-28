<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Funeralinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funeralinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('relationship');
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->date('dateofbirth');
            $table->date('dateofpassing');
            $table->string('location');
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
        Schema::dropIfExists('funeralinfo');
    }
}
