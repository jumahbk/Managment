<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('creationDate');


            $table->unsignedBigInteger('creator')->nullable();
            $table->unsignedBigInteger('first')->nullable();
            $table->unsignedBigInteger('second')->nullable();
            $table->unsignedBigInteger('third')->nullable();
            $table->unsignedBigInteger('final')->nullable();

            $table->date('firstDate');
            $table->date('secondDate');
            $table->date('thirdDate');
            $table->date('finalDate');


            $table->string('comments')->nullable();


            $table->unsignedBigInteger('product_id');


            $table->integer('amount')->default(0);
            $table->boolean('approved')->default('false');


            $table->index('creator')->nullable();
            $table->index('first')->nullable();
            $table->index('second')->nullable();
            $table->index('third')->nullable();
            $table->index('final')->nullable();
            $table->index('product_id');





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
        Schema::dropIfExists('requests');
    }
}
