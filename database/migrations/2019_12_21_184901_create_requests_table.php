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
            $table->unsignedBigInteger('waiting')->nullable();
            $table->unsignedBigInteger('doctor')->nullable();
            $table->unsignedBigInteger('manager')->nullable();
            $table->unsignedBigInteger('pharm')->nullable();
            $table->unsignedBigInteger('waitingon')->nullable();

            $table->unsignedBigInteger('department_id');

            $table->unsignedBigInteger('accountant')->nullable();

            $table->string('comments')->nullable();

            $table->unsignedBigInteger('product_id');









            $table->integer('amount')->default(0);
            $table->boolean('approved')->default('false');



            $table->index('waitingon');

            $table->index('creator')->nullable();
            $table->index('waiting')->nullable();
            $table->index('doctor')->nullable();
            $table->index('manager')->nullable();
            $table->index('pharm')->nullable();

            $table->index('department_id');

            $table->index('accountant')->nullable();

            $table->string('comments')->nullable();

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
