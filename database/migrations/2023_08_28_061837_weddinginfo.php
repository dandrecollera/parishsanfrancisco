<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Weddinginfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weddinginfo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('bridename');
            $table->string('bridemother');
            $table->string('bridefather');
            $table->integer('brideage');
            $table->date('bridebirth');
            $table->string('bridenumber');
            $table->string('brideemail');
            $table->string('brideaddress');

            $table->string('groomname');
            $table->string('groommother');
            $table->string('groomfather');
            $table->integer('groomage');
            $table->date('groombirth');
            $table->string('groomnumber');
            $table->string('groomemail');
            $table->string('groomaddress');

            $table->string('requirement');
            $table->string('requirement2');
            $table->string('requirement3');
            $table->string('requirement4');
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
        Schema::dropIfExists('weddinginfo');
    }
}
