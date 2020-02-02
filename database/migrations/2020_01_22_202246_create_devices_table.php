<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('englishName')->nullable();
            $table->string('arabicName')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('vendor_id')->nullable();

            $table->unsignedBigInteger('device_id')->nullable();


            $table->date('purchased')->nullable();

            $table->date('warranty')->nullable();

            $table->double('cost')->default(0);
            $table->boolean('vat')->default(false);
            $table->boolean('charged')->default(false);


            $table->index('room_id');
            $table->index('department_id');
            $table->index('vendor_id');
            $table->index('device_id');

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
        Schema::dropIfExists('devices');
    }
}
