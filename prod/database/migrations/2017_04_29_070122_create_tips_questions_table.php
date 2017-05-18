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
        DB::table('tips_questions')->insert(array(
            array(
                'tips_id' => 1,
                'question_id' => 1,
                'question_answer' => 'Lorem ipsum dolor sit amet, ut his invidunt 
                scriptorem, ridens labitur reprehendunt mea ei. Omnes iuvaret pri in. 
                Wisi adversarium at sit, et duo delenit volutpat posidonium, fugit ullamcorper no eam. 
                Mollis corpora ius ne. Vix in adhuc posse aperiri.'
            ),
            // id 2
            array(
                'tips_id' => 1,
                'question_id' => 2,
                'question_answer' => 'Lorem ipsum dolor sit amet, ut his invidunt 
                scriptorem, ridens labitur reprehendunt mea ei. Omnes iuvaret pri in. 
                Wisi adversarium at sit, et duo delenit volutpat posidonium, fugit ullamcorper no eam. 
                Mollis corpora ius ne. Vix in adhuc posse aperiri.'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 3,
                'question_answer' => 'Modified a learning activity'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 4,
                'question_answer' => 'Added new learning activity'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 5,
                'question_answer' => 'Lorem ipsum dolor sit amet, ut his invidunt 
                scriptorem, ridens labitur reprehendunt mea ei. Omnes iuvaret pri in. 
                Wisi adversarium at sit, et duo delenit volutpat posidonium, fugit ullamcorper no eam. 
                Mollis corpora ius ne. Vix in adhuc posse aperiri.'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 6,
                'question_answer' => 'Added new learning activity'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 7,
                'question_answer' => 'Lorem ipsum dolor sit amet, ut his invidunt 
                scriptorem, ridens labitur reprehendunt mea ei. Omnes iuvaret pri in. 
                Wisi adversarium at sit, et duo delenit volutpat posidonium, fugit ullamcorper no eam. 
                Mollis corpora ius ne. Vix in adhuc posse aperiri.'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 8,
                'question_answer' => 'Added new learning activity'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 9,
                'question_answer' => 'Lorem ipsum dolor sit amet, ut his invidunt 
                scriptorem, ridens labitur reprehendunt mea ei. Omnes iuvaret pri in. 
                Wisi adversarium at sit, et duo delenit volutpat posidonium, fugit ullamcorper no eam. 
                Mollis corpora ius ne. Vix in adhuc posse aperiri.'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 10,
                'question_answer' => 'Provided “real world” examples or applications'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 11,
                'question_answer' => 'Lorem ipsum dolor sit amet, ut his invidunt 
                scriptorem, ridens labitur reprehendunt mea ei. Omnes iuvaret pri in. 
                Wisi adversarium at sit, et duo delenit volutpat posidonium, fugit ullamcorper no eam. 
                Mollis corpora ius ne. Vix in adhuc posse aperiri.'
            ),
            array(
                'tips_id' => 1,
                'question_id' => 12,
                'question_answer' => 'Reviewed the materials'
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
        Schema::dropIfExists('tips_questions');
    }
}
