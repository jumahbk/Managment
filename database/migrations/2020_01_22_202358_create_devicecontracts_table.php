<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicecontractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devicecontracts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('device_id');

            $table->boolean('deleted')->default('false');

            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();

            $table->string('details')->nullable();

            $table->double('amount')->default(0);
            $table->boolean('vat')->default(false);
            $table->boolean('charged')->default(false);

            $table->string('attachemnt1')->nullable();
            $table->string('attachemnt2')->nullable();
            $table->string('attachemnt3')->nullable();




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
        Schema::dropIfExists('devicecontracts');
    }
}
