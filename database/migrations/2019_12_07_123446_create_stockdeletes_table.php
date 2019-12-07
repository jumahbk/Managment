<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockdeletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockdeletes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('oldId')->nullable();;

            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();



            $table->string('batch')->nullable();;
            $table->double('total')->default(1);
            $table->double('usedUnits')->default(0);
            $table->string('serial')->nullable();;
            $table->string('notes')->nullable();
            $table->date('receivedDate')->nullable();
            $table->date('expDate')->nullable();
            $table->double('cost')->default(0);

            $table->string('rs')->nullable();;

            $table->index('product_id')->nullable();;
            $table->index('user_id')->nullable();;
            $table->index('warehouse_id')->nullable();;



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
        Schema::dropIfExists('stockdeletes');
    }
}
