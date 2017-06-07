<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty', function (Blueprint $table) {
            $table->increments('faculty_id');
            $table->integer('division_id')->nullable();
            $table->string('faculty_name');
            $table->string('email');
            $table->string('faculty_canvas_id')->nullable();
            $table->enum('employee_type', ['FULLTIME','PARTTIME'])->nullable();
            $table->boolean('is_admin');
            $table->boolean('is_active');
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
        Schema::dropIfExists('faculty');
    }
}
