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
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('article_id')->default(1);
            $table->string('name', 128);
            $table->string('picture', 128)->nullable();
            $table->string('homepage', 128)->nullable();
            $table->string('email', 128);
            $table->string('ip_address', 16);
            $table->text('body');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            // Para respostas a outros comentários
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
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