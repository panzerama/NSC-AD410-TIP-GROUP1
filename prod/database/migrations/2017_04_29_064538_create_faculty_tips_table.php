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
            $table->boolean('is_author');
            
            
        });
        Schema::table('faculty_tips', function (Blueprint $table) {
            //foreign keys
            $table->foreign('faculty_id')
                ->references('faculty_id')
                ->on('faculty')
                ->onDelete('cascade');
            $table->foreign('tips_id')
                ->references('tips_id')
                ->on('tips')
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
        Schema::dropIfExists('faculty_tips');
    }
}
