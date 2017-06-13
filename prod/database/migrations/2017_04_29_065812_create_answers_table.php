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
<<<<<<< HEAD
=======
        DB::table('answers')->insert(array(
            //TYPE DROPDOWN
            array(
                'question_id' => 1,
                'answer_text' => 'Individual',
                'is_active' => true
            ),
            array(
                'question_id' => 1,
                'answer_text' => 'Group',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'ACCT',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'ABE',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'AME',
                'is_active' => true
            ),
            array(
                'question_id' => 2,
                'answer_text' => 'ASL',
                'is_active' => true
            ),
            array(
                'question_id' => 5,
                'answer_text' => 'Fall',
                'is_active' => true
            ),
            //
            array(
                'question_id' => 5,
                'answer_text' => 'Winter',
                'is_active' => true
            ),
            array(
                'question_id' => 5,
                'answer_text' => 'Spring',
                'is_active' => true
            ),
            array(
                'question_id' => 5,
                'answer_text' => 'Summer',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2017',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2018',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2019',
                'is_active' => true
            ),
            array(
                'question_id' => 6,
                'answer_text' => '2020',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 9,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            //
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
            array(
<<<<<<< HEAD
                'question_id' => 12,
=======
                'question_id' => 6,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 12,
=======
                'question_id' => 6,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 12,
=======
                'question_id' => 6,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 12,
=======
                'question_id' => 6,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 12,
=======
                'question_id' => 6,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 12,
=======
                'question_id' => 6,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 12,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
                        array(
                'question_id' => 14,
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
                'question_id' => 14,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            //
            array(
                'question_id' => 16,
=======
                'question_id' => 6,
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            array(
                'question_id' => 8,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 16,
=======
                'question_id' => 8,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 16,
=======
                'question_id' => 8,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 16,
=======
                'question_id' => 8,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 16,
=======
                'question_id' => 8,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Tried a new approach to the material',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 16,
=======
                'question_id' => 8,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Reapportioned time/effort devoted to topics',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 16,
=======
                'question_id' => 8,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Reviewed the material',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 18,
=======
                'question_id' => 10,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Modified a learning activity',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 18,
=======
                'question_id' => 10,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Added new learning activity',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 18,
=======
                'question_id' => 10,
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Provided more context or more practice',
                'is_active' => true
            ),
            array(
<<<<<<< HEAD
                'question_id' => 18,
=======
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
                'answer_text' => 'Modified a learning activity',
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
>>>>>>> d4c2db7be0065ced085f1a97591bf9518091356e
                'answer_text' => 'Provided “real world” examples or applications',
                'is_active' => true
            )
        ));
        
>>>>>>> d4a82f80999d15a2f4c133684882286cfefc4c8a
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
