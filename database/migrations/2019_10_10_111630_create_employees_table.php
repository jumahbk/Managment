<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('title_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();

            $table->string('englishName')->nullable();
            $table->string('arabicName')->nullable();
            $table->string('idNo')->nullable();
            $table->date('idExp')->nullable();

            $table->string('passNo')->nullable();
            $table->date('passExp')->nullable();


            $table->unsignedBigInteger('nationality_id');
            $table->boolean('delete')->default(false);
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();

            $table->string('gosi')->nullable();

            $table->string('lic')->nullable();
            $table->string('licExp')->nullable();
            $table->string('birthdate')->nullable();


            $table->string('moh')->nullable();
            $table->string('mohExp')->nullable();


            $table->string('iban')->nullable();
            $table->string('bankcode')->nullable();


            $table->index('company_id');

            $table->index('title_id');
            $table->index('nationality_id');
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
        Schema::dropIfExists('employees');
    }
}
