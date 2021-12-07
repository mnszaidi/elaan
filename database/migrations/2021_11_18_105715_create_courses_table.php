<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_code')->unique();
            $table->string('course_name');
            $table->string('course_title');
            $table->string('course_summary');
            $table->text('course_description');
            $table->string('course_price');
            $table->string('course_image')->nullable()->default('no_image.png');
            $table->boolean('course_shown')->default('0');
            $table->boolean('course_status')->default('1');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('currency_id');
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
