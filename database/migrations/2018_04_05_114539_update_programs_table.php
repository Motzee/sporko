<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->renameColumn('id_author', 'id_user') ;
            $table->unsignedInteger('id_user')->change() ;
            $table->foreign('id_user')->references('id')->on('users') ;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign('id_user') ;
            $table->renameColumn('id_user', 'id_author') ;
        });
    }
}
