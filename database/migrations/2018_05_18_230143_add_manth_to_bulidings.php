<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManthToBulidings extends Migration
{
    public function up()
    {
        Schema::table('bulidings', function (Blueprint $table) {
            $table->string('manth');
        });
    }

    public function down()
    {
        Schema::table('bulidings', function (Blueprint $table) {
            //
        });
    }
}
