<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RealUpdate1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('c_cposts', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('c_cusers');
            });
        //////////////////////////////////////////////////////////////////////////////////
        Schema::table('c_ccomments', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('c_cusers');
            });
        Schema::table('c_ccomments', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('c_cposts');
            });
        ///////////////////////////////////////////////////////////////////////////////
         Schema::table('c_cfollowings', function (Blueprint $table) {
            $table->integer('follower_id')->unsigned();
            $table->foreign('follower_id')->references('id')->on('c_cusers');
            });
        Schema::table('c_cfollowings', function (Blueprint $table) {
                $table->integer('followed_id')->unsigned();
                $table->foreign('followed_id')->references('id')->on('c_cusers');
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
