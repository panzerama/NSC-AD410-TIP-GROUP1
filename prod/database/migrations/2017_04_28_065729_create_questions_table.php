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
