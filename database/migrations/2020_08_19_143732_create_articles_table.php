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
            $table->bigIncrements('id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->mediumText('description');
            $table->mediumText('content');
            $table->tinyInteger('active')->index()->default(1);
            $table->string('description_seo');
            $table->string('title_seo');
            $table->string('avatar');
            $table->integer('view')->default(0);
            $table->date('date');
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
        Schema::dropIfExists('articles');
    }
}
