<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->integer('unit')->default(1);
            $table->unsignedBigInteger('unit_id');


            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->unsignedBigInteger('stock_id')->nullable();

            $table->string('serial');

            $table->date('expDate')->nullable();



            $table->index('unit_id');
            $table->index('stock_id');
            $table->index('warehouse_id');
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
        Schema::dropIfExists('items');
    }
}
