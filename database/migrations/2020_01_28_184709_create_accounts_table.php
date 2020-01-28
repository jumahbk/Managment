<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('code_id')->nullable();

            $table->string('name');
            $table->string('alternate');

            $table->boolean('vat')->default(false);


            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('accounttype_id')->nullable();

            $table->index('vendor_id');
            $table->index('accounttype_id');
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
        Schema::dropIfExists('accounts');
    }
}
