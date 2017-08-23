<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures',function(Blueprint $table){
            $table->string('id')->uniqid();
            $table->string('news_id');//
            $table->string('url');
            $table->integer('is_hidden')->default(0);//是否隐藏，默认0 ，0 显示，1隐藏
            $table->integer('orders')->default(0);//排序，0 最小，数字越大排最前面
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
