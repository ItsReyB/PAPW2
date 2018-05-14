<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostAdditionalInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('c_cposts', function (Blueprint $table) {            
            $table->string('publishdate')->after('ComicNum');
            $table->string('sinopsis',200)->after('publishdate');
            $table->string('writer')->after('sinopsis');
            $table->string('artist')->after('writer');    
            $table->integer('stars')->after('text');
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
