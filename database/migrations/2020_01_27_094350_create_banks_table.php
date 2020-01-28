<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('englishName');
            $table->string('arabicName');
            $table->string('short');
            $table->string('mainContact')->nullable();
            $table->string('mainContactNumber')->nullable();
            $table->string('mainContactEmail')->nullable();

            $table->string('secondContact')->nullable();
            $table->string('secondContactNumber')->nullable();
            $table->string('secondContactEmail')->nullable();

            $table->boolean('deleted')->default(false);

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
        Schema::dropIfExists('banks');
    }
}
