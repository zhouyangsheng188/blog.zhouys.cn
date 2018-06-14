<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('分类主键id');
            $table->string('name', 15)->default('')->comment('分类名称');
            $table->string('keywords',20)->default('')->comment('关键词');
            $table->string('description')->default('')->comment('描述');
            $table->tinyInteger('sort')->default(0)->unsigned()->comment('排序');
            $table->tinyInteger('pid')->default(0)->unsigned()->comment('父级栏目id');
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
        Schema::dropIfExists('categories');
    }
}
