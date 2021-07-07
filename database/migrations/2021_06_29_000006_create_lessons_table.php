<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('status')->nullable();
            $table->boolean('free_lesson')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
