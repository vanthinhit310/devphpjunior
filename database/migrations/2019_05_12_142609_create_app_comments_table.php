<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 190);
            $table->string('email', 190);
            $table->string('company', 190)->nullable();
            $table->text('comment')->nullable();
            $table->integer('accept')->default(1);
            $table->integer('id_comment_parent')->default(0);
            $table->integer('id_post')->default(0);
            $table->integer('user_id')->default(0);
            $table->string('data_type')->nullable();
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
        Schema::dropIfExists('app_comments');
    }
}
