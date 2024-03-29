<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Department extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('arabicName')->nullable();;
            $table->string('englishName');

            $table->unsignedBigInteger('branch_id');

            $table->unsignedBigInteger('employee_id');

            $table->boolean('deleted')->default(false);

            $table->index('branch_id');
            $table->index('employee_id');

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
        //
    }
}
