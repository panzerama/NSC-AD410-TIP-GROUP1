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
            $table->increments('id');
            $table->string('faculty_name');
            $table->string('email');
            $table->boolean('is_admin');
            $table->string('admin_password')->nullable();
            $table->boolean('is_active');
            $table->enum('employee_type', ['FULLTIME','PARTTIME'])->nullable();
            $table->timestamps();
        });
        
        // Insert faculty test data
        DB::table('faculty')->insert(array(
            array(
                'faculty_name' => 'John Stager',
                'email' => 'Zhou.Wu@seattlecolleges.edu',
                'is_admin' => false,
                'is_active' => true,
                'employee_type' => 'PARTTIME'
            ),
            array(
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
