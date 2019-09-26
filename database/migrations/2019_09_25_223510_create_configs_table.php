<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('copyright')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_twitter')->nullable();
            $table->string('link_google_plus')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_github')->nullable();
            $table->string('link_flickr')->nullable();
            $table->string('link_skype')->nullable();
            $table->string('paragraph_title_footer')->nullable();
            $table->text('paragraph_footer')->nullable();
            $table->boolean('allows_registration')->default(true);
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
        Schema::dropIfExists('configs');
    }
}
