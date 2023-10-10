<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Anointinginfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anointinginfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('relationship');
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->date('dateofbirth');
            $table->string('address');
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
        Schema::dropIfExists('anointinginfo');
    }
}
