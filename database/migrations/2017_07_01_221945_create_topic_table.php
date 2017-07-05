<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');//标题
            $table->string('intro');//简介
            $table->string('cover')->nullable();//新闻封面图
            $table->tinyInteger('is_hidden')->default(0);
            $table->timestamps();
        });
        Schema::create('topics_news', function(Blueprint $table){
            $table->increments('id');//新闻编号
            $table->integer('news_id')->default(0);//新闻编号
            $table->integer('topics_id')->default(0);//专题编号
            $table->tinyInteger('is_recommend')->default(0);//专题编号
            $table->tinyInteger('sort')->default(0);//专题编号
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
