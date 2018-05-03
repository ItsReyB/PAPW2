<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCCusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_cusers', function (Blueprint $table) {
            //$table->increments('id');

            $table->increments('id')->unsigned();
            //$user->primary('id');
            $table->string('name', 100);
            $table->string('password', 100);
            //$table-> ('ProfilePhoto')->default($dfltPhoto);
            $table->integer('NumFollow');
            $table->boolean('active');
            //$user->timestamps();

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
        Schema::dropIfExists('c_cusers');
    }
}
