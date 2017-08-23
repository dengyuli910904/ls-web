<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_picture',function(Blueprint $table){
            $table->string('id')->uniqid();
            $table->string('news_id');
            $table->string('name');
            $table->text('description');
            // $table->is_integer('is_hidden');
            // $table->string('user_id');
            // $table->integer('is_recommend');
            $table->datetime('publishtime');//发布时间

            $table->string('editor')->nullable();//编辑
            $table->integer('user_id');//添加人id

            $table->smallInteger('is_recommend')->default(0);//是否推荐 0 不推荐； 1推荐
            $table->smallInteger('is_hot')->default(0);//是否热门 0 非热门； 1 热门
            $table->smallInteger('is_recommend_frontpage')->default(0);//是否推荐到首页 0 不推荐； 1推荐
            $table->smallInteger('is_hidden')->default(0);//是否隐藏 0 不隐藏； 1隐藏，默认显示
            $table->smallInteger('is_approved')->default(1);//是否审核通过，0未通过；1通过 ，默认通过

            $table->integer('comment_count')->default(0);//评论数量
            $table->integer('click_count')->default(0);//点击量
            $table->integer('read_count')->default(0);//阅读量
            $table->integer('parise_count')->default(0);//点赞数
            $table->integer('collect_count')->default(0);//收藏数
            // $table->integer('')

            $table->string('tags')->nullable();//新闻标签,内容以逗号隔开如：娱乐，社会，电影，体育
            $table->string('keyword')->nullable();//关键词
            $table->string('resource')->nullable();//新闻来源
            $table->string('resource_url')->nullable();//新闻来源链接

            $table->integer('orders')->default(0);//排序 0 最小
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
        Schema::dropIfExists('news_picture');
    }
}
