<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tips_questions', function (Blueprint $table) {
            $table->integer('tips_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->text('question_answer')->nullable();
            $table->timestamps();
        });
        
        Schema::table('tips_questions', function (Blueprint $table) {
            $table->foreign('tips_id')
                  ->references('tips_id')
                  ->on('tips')
                  ->onDelete('cascade');
            
            $table->foreign('question_id')
                  ->references('question_id')
                  ->on('questions')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tips_questions');
    }
}
