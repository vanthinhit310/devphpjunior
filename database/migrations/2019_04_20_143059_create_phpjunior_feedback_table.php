<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhpjuniorFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phpjunior_feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_fb',191);
            $table->string('email_fb',191);
            $table->string('phone_fb',191);
            $table->string('subject_fb',191);
            $table->text('message_fb');
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
        Schema::dropIfExists('phpjunior_feedback');
    }
}
