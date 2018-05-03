<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCCpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_cposts', function (Blueprint $table) {
            //$table->increments('id');

            $table->increments('id')->unsigned();
            //$table->primary('id');
            //$post-> ('ComicPhoto')->default($dfltPhoto);
            $table->string('ComicTitle');
            $table->string('ComicNum')->default('1');            
            $table->string('text', 500);
            $table->integer('Likes');

            

            $table->timestamps();
        });
        

            //editoral
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_cposts');
    }
}
