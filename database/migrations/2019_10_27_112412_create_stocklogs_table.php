<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocklogs', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('user_id');
            $table->double('amountUsed');

            $table->unsignedBigInteger('stock_id');


            $table->index('stock_id');
            $table->index('employee_id');

            $table->index('user_id');

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
        Schema::dropIfExists('stocklogs');
    }
}
