<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->integer('question_number');
            $table->text('question_text');
            $table->enum('question_type', ['TEXT','RADIO','CHECKBOX','DROPDOWN']);
            $table->boolean('is_active');
            $table->text('question_desc')->nullable();
            $table->timestamps();
        });
        
        // Insert questions test data
        DB::table('questions')->insert(array(
            // id 1
            array(
                'question_number' => 1,
                'question_text' => 'What is the problem or lesson that you 
                    identified and will be discussing in this TIP? No topic is 
                    too big or too small. All are welcomed!',
                'question_type' => 'TEXT',
                'is_active' => true,
                'question_desc' => null
            ),
            // id 2
            array(
                'question_number' => 2,
                'question_text' => 'Which of the college-wide Essential Learning
                    Outcomes does your TIP most closely address? ',
                'question_type' => 'DROPDOWN',
                'is_active' => true,
                'question_desc' => null
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
        Schema::dropIfExists('questions');
    }
}
