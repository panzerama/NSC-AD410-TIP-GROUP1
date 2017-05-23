<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answer_id');
            $table->integer('question_id')->unsigned();
            $table->text('answer_text');
            $table->boolean('is_active');
            $table->timestamps();
        });
        
        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('question_id')
                ->references('question_id')
                ->on('questions')
                ->onDelete('cascade');
        });
        
        // Insert answers test data
        DB::table('answers')->insert(array(
            //TYPE DROPDOWN
            array(
                'question_id' => 3,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 3,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 3,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 3,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 3,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 3,
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 3,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            //
            array(
                'question_id' => 4,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 4,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 4,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 4,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 4,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 4,
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 4,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 10,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            // TYPE: RADIO buttons
            array(
                'question_id' => 12,
                'answer_text' => 'TEST change',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 12,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
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
        Schema::dropIfExists('answers');
    }
}
