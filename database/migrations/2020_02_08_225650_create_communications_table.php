<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('attachment1')->nullable();
            $table->string('attachment2')->nullable();
            $table->string('attachment3')->nullable();
            $table->string('phone')->nullable();
            $table->string('source_id')->nullable();
            $table->unsignedBigInteger('communicator_id')->nullable();

            $table->unsignedBigInteger('letter_type_id')->nullable();

            $table->index('communicator_id');
            $table->boolean('deleted')->default('false');

            $table->index('letter_type_id');
            $table->boolean('in')->default('true');


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
        Schema::dropIfExists('communications');
    }
}