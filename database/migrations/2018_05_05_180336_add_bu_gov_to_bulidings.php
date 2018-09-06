<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBuGovToBulidings extends Migration
{
    public function up()
    {
        Schema::table('bulidings', function (Blueprint $table) {
            $table->string('bu_gov')->default('none');
        });
    }

    public function down()
    {
        Schema::table('bulidings', function (Blueprint $table) {
            //
        });
    }
}
