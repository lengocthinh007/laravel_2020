<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('alias')->index();
            $table->integer('price')->default(0);
            $table->tinyInteger('pro_sale')->default(0);
             $table->tinyInteger('pro_active')->default(1)->index();
             $table->tinyInteger('pro_hot')->default(0);
              $table->integer('pro_view')->default(0);
            $table->string('image')->nullable();
            $table->string('keywords_seo')->nullable();
            $table->string('description')->nullable();
             $table->string('description_seo')->nullable();
            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cate_id')->index()->unsigned();
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');
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
