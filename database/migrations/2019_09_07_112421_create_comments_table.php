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
        Schema::create('comments',
            function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('approved')->default(false);
            //$table->unsignedBigInteger('user_id')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('deslikes')->nullable();
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name', 128);
            $table->string('picture', 128)->nullable();
            $table->string('homepage', 128)->nullable();
            $table->string('email', 128);
            $table->string('ip_address', 16);
            $table->text('body');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}