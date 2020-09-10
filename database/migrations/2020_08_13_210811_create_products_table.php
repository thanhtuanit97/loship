<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('quantity');
            $table->integer('price');
            $table->mediumText('description');
            $table->mediumText('content');
            $table->integer('views')->default(0);
            $table->integer('hot')->default(0);
            $table->integer('active')->default(1)->index();
            $table->string('avatar');
            $table->text('image_list');
            $table->integer('author_id');
            $table->string('description_seo');
            $table->integer('pay')->default(0);
            $table->string('keyword_seo');
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
        Schema::dropIfExists('products');
    }
}
