<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommnetUserIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建用户评论索引表
        // Schema::create('comments_user',function(Blueprint $table){
        //     // // $table->increments('id');
        //     // $table->string('id')->uniqid();//记录id
        //     // $table->string('comments_id');//评论id
        //     // $table->string('users_id');//用户id
        //     // $table->string('')
        // });
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
