<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar');
            $table->string('confirmation_token'); //邮箱验证token
            $table->smallInteger('is_active')->default(0); //用户是否激活了邮箱
            $table->integer('questions_count')->default(0);
            $table->integer('answer')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('favorites_count')->default(0);//收藏
            $table->integer('likes_count')->default(0);//点赞
            $table->integer('followers_count')->default(0);//关注
            $table->integer('followings_count')->default(0);//被关注
            $table->json('settings')->nullable(); //个人资料信息


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
