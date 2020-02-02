<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountspayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountspayables', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('paymentDate');
            $table->string('classType');
            $table->unsignedBigInteger('fid');
            $table->double('amount')->default(0);
            $table->boolean('vat')->default(false);
            $table->boolean('deleted')->default(false);
            $table->unsignedBigInteger('pID')->nullable();





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
        Schema::dropIfExists('accountspayables');
    }
}
