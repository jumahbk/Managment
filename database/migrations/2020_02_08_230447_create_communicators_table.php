<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communicators', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('contactName')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();

            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();


            $table->string('address')->nullable();

            $table->boolean('deleted')->default(false);


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
        Schema::dropIfExists('communicators');
    }
}
