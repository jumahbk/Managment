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
            $table->string('idNo')->nullable()->unique();
            $table->date('idExp')->nullable();

            $table->string('passNo')->nullable()->unique();
            $table->date('passExp')->nullable();


            $table->unsignedBigInteger('nationality_id');
            $table->boolean('delete')->default(false);
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();

            $table->string('gosi')->nullable()->unique();

            $table->string('lic')->nullable()->unique();
            $table->string('licExp')->nullable()->unique();
            $table->string('birthdate')->nullable()->unique();


            $table->string('moh')->nullable()->unique();
            $table->string('mohExp')->nullable()->unique();


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
