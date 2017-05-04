<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create divisions table
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('division_id');
            $table->string('division_name');
            $table->string('abbr');
            $table->boolean('is_active');
            $table->timestamps();
        });
        
        // Insert divisions test data
        DB::table('divisions')->insert(array(
            array(
                'division_name' => 'Arts, Humanities, and Social Sciences',
                'abbr' => 'AHSS',
                'is_active' => true
            ),
            array(
                'division_name' => 'testing testing tester',
                'abbr' => 'TTT',
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
        Schema::dropIfExists('divisions');
    }
}
