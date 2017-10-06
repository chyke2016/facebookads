<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cashout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cashouts', function (Blueprint $table) {  
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('amount')->nullable();
            $table->string('phone')->nullable();
            $table->string('paid')->nullable();
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
        Schema::dropIfExists('cashouts');
    }
}
