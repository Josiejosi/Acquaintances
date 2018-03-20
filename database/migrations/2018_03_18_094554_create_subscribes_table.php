<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('creator_id')->unsigned() ;
            $table->integer('follower_id')->unsigned() ;
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users') ;
            $table->foreign('follower_id')->references('id')->on('users') ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribes');
    }
}
