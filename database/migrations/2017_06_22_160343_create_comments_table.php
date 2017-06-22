<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //新闻详情表
        Schema::create('news',function(Blueprint $table){
            $table->increments('id');
            $table->string('uuid')->uniqid();//新闻uuid
            $table->string('title');//新闻标题
            $table->string('intro');//新闻简介
            $table->string('cover')->nullable();//新闻封面图
            $table->string('content');//新闻内容
            $table->timestamp('publishtime');//发布时间
            $table->integer('click_count');//点击量
            $table->integer('read_count');//阅读量
            $table->string('tags')->nullable();//新闻标签,内容以逗号隔开如：娱乐，社会，电影，体育
            $table->string('editor')->nullable();//编辑
            $table->smallInteger('is_recommend')->default(0);//是否推荐 0 不推荐； 1推荐
            $table->smallInteger('is_hidden')->default(0);//是否隐藏 0 不隐藏； 1隐藏，默认显示
            $table->smallInteger('is_approved')->default(1);//是否审核通过，0未通过；1通过 ，默认通过
            $table->integer('comment_count')->default(0);//评论数量
            $table->string('resource')->nullable();//新闻来源
            $table->string('keyword')->nullable();//关键词
            $table->string('resource_url')->nullable();//新闻来源链接
            $table->timestamps();
        });

        //新闻类型表
        Schema::table('news_category',fucntion(Blueprint $table){
            $table->increments('id');
            $table->string('uuid')->uniqid();//新闻类型uuid
            $table->string('name');//新闻类型名称
            $table->smallInteger('is_hidden')->default(0);//是否隐藏 0 不隐藏； 1隐藏，默认显示
            $table->timestamps();
        });

        //新闻详情与新闻类型索引表
        Schema::table('index_news_categorid',function(Blueprint $table){
            $table->increments('id');
            $table->string('uuid')->uniqid();//新闻类型uuid
            $table->string('news_uuid');//新闻类型名称
            $table->string('type_uuid');//新闻类型名称
            $table->smallInteger('is_recommend')->default(0);//是否推荐 0 不推荐； 1推荐
            $table->smallInteger('is_hidden')->default(0);//是否隐藏 0 不隐藏； 1隐藏，默认显示
            $table->smallInteger('is_approved')->default(1);//是否审核通过，0未通过；1通过 ，默认通过
            $table->timestamps();
        });

        //评论内容表
        Schema::create('news_comments',function(Blueprint $table){
            $table->increments('id');
            $table->string('uuid');//评论uuid
            $table->string('content');//评论内容
            $table->integer('news_uuid');//新闻id
            $table->integer('parent_uuid')->default(0);//上一级id，默认为0
            $table->integer('level')->default(0);//层级，默认为0
            $table->integer('likes_count')->default(0);//点赞数
            $table->integer('bury_count')->default(0);//踩数
            // $table->smallInteger('is_approved')->default(1);//是否审核通过，默认通过
            $table->smallInteger('is_hidden')->default(1);//是否显示，默认显示
            $table->timestamps();//时间
        });

        //评论和用户索引表
        Schema::table('index_news_comments_user',function(Blueprint $table){
            $table->increments('id');
            $table->string('uuid');//关联uuid
            $table->string('users_uuid');//用户id
            $table->string('news_uuid');//新闻uuid
            $table->string('news_comments_uuid');//新闻评论记录id
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
