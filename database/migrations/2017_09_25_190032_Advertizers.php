<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advertizers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('advertizers', function (Blueprint $table) {  
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('url')->nullable();
            $table->string('upload')->nullable();
            $table->boolean('confirmed')->nullable();
            $table->string('no_of_shares')->nullable();
            $table->string('share_recorded')->nullable();
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
         Schema::dropIfExists('advertizers');
    }
}
