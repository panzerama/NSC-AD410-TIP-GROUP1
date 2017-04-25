<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('division');
            $table->string('course');
            $table->string('course_number');
            $table->enum('quarter', ['FALL', 'WINTER', 'SPRING', 'SUMMER']);
            $table->integer('year');
            $table->boolean('is_finished');
            $table->boolean('is_group');
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
        Schema::drop('tips');
    }
}
