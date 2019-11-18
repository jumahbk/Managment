<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();



            $table->string('batch');
            $table->integer('total')->default(1);
            $table->integer('usedUnits')->default(0);
            $table->string('serial');
            $table->string('notes')->nullable();
            $table->date('receivedDate')->nullable();
            $table->date('expDate')->nullable();
            $table->double('cost')->default(0);



            $table->index('product_id');
            $table->index('user_id');
            $table->index('warehouse_id');



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
        Schema::dropIfExists('stocks');
    }
}