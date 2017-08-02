<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 用户收藏新闻表
         */
        Schema::create('news_collection',function(Blueprint $table){
            $table->string('id')->uniqid();//收藏记录id，采用uuid
            $table->string('users_id');//收藏用户id
            $table->string('news_uuid');//收藏的新闻id
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
