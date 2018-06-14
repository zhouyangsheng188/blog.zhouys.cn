<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('category_id')->unsigned()->default(0)->comment('文章分类id');
            $table->string('author',10)->default('')->comment("作者");
            $table->string('title',30)->default('')->comment("文章的标题");
            $table->text('content')->default('')->comment("文章的内容");
            $table->string('description')->default('')->comment('描述');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('cover')->default('')->comment('封面图');
            $table->tinyInteger('is_top')->unsigned()->default(0)->comment('是否置顶 1是 0否');
            $table->integer('click')->unsigned()->default(0)->comment('点击数');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
