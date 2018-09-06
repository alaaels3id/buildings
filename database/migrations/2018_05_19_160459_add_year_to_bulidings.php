<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearToBulidings extends Migration
{
    public function up()
    {
        Schema::table('bulidings', function (Blueprint $table) {
            $table->string('year');
        });
    }

    public function down()
    {
        Schema::table('bulidings', function (Blueprint $table) {
            //
        });
    }
}
