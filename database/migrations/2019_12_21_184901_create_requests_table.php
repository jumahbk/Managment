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

            $table->unsignedBigInteger('creator')->nullable();
            $table->unsignedBigInteger('first')->nullable();
            $table->unsignedBigInteger('second')->nullable();
            $table->unsignedBigInteger('third')->nullable();
            $table->unsignedBigInteger('final')->nullable();

            $table->date('createDate')->nullable();
            $table->date('firstDate')->nullable();

            $table->date('secondDate')->nullable();
            $table->date('thirdDate')->nullable();
            $table->date('finalDate')->nullable();


            $table->string('comments')->nullable();


            $table->unsignedBigInteger('product_id');


            $table->integer('amount')->default(0);
            $table->boolean('approved')->default('false');


            $table->index('creator');
            $table->index('first');
            $table->index('second');
            $table->index('third');
            $table->index('final');
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
