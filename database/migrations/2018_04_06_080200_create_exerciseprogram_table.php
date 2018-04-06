<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseprogramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_program', function (Blueprint $table) {
            $table->unsignedInteger('id_exercise') ;
            $table->foreign('id_exercise')->references('id')->on('exercises') ;
            $table->unsignedInteger('id_program') ;
            $table->foreign('id_program')->references('id')->on('programs') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('id_exercise') ;
        $table->dropForeign('id_program') ;
        Schema::dropIfExists('exercise_program');
    }
}
