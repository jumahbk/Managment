<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('arabicName')->nullable();
            $table->string('englishName')->nullable();

            $table->string('phone')->nullable();
            $table->string('cr')->nullable();


            $table->string('contactName')->nullable();
            $table->string('mobile')->nullable();


            $table->string('contactName2')->nullable();
            $table->string('mobile2')->nullable();

            $table->boolean('deleted')->default('false');

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
        Schema::dropIfExists('vendors');
    }
}
