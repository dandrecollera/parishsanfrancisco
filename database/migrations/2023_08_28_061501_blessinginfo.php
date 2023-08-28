<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blessinginfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blessinginfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('address');
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
        Schema::dropIfExists('blessinginfo');
    }
}
