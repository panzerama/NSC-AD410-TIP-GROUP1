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
            $table->string('faculty_canvas_id');
            $table->enum('employee_type', ['FULLTIME','PARTTIME'])->nullable();
            $table->boolean('is_admin');
            $table->boolean('is_active');
            $table->timestamps();
            
            //basic foreign key creation
            $table->foreign('division_id')->references('division_id')->on('division');
        });
        
        // Insert faculty test data
        DB::table('faculty')->insert(array(
            array(
                'division_id' => 1,
                'faculty_name' => 'John Stager',
                'email' => 'Zhou.Wu@seattlecolleges.edu',
                'is_admin' => false,
                'is_active' => true,
                'employee_type' => 'PARTTIME'
            ),
            array(
                'division_id' => 2,
                'faculty_name' => 'Paul Wu',
                'email' => 'John.Stager@seattlecolleges.edu',
                'is_admin' => true,
                'is_active' => true,
                'employee_type' => 'FULLTIME'
            )
        ));
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
