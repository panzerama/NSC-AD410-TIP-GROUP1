<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_tips', function (Blueprint $table) {
            $table->integer('faculty_id')->unsigned();
            $table->integer('tips_id')->unsigned();
            
            //foriegn keys
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty');
            $table->foreign('tips_id')->references('tips_id')->on('tips');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
