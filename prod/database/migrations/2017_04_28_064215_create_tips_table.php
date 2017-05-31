<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('tips_id');
            $table->integer('division_id')->unsigned()->nullable();
            $table->string('course_name')->nullable();
            $table->string('course_number')->nullable();
            $table->enum('quarter', ['FALL','WINTER','SPRING','SUMMER'])->nullable();
            $table->integer('year')->nullable();
            $table->boolean('is_finished');
            $table->boolean('is_active');
            $table->boolean('is_group')->nullable();
            $table->timestamps();
            
            //basic foreign key creation
            $table->foreign('division_id')->references('division_id')->on('division');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tips');
    }
}
