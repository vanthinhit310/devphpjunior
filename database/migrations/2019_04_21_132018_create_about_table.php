<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',191);
            $table->text('blog_quotes');
            $table->text('description');
            $table->string('ps',191);
            $table->string('facebook',191)->nullable();
            $table->string('youtube',191)->nullable();
            $table->string('google',191)->nullable();
            $table->string('github',191)->nullable();
            $table->string('linkedin',191)->nullable();
            $table->string('skype',191)->nullable();
            $table->string('website',191)->nullable();
            $table->string('email',191)->nullable();
            $table->string('phone',191)->nullable();
            $table->string('address',191)->nullable();
            $table->string('fax',191)->nullable();
            $table->string('name',191)->nullable();
            $table->string('age',191)->nullable();
            $table->string('birth_day',191)->nullable();
            $table->string('contact_qoutes',191)->nullable();
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
        Schema::dropIfExists('about');
    }
}
