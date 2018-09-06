<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulidingsTable extends Migration
{
    public function up()
    {
        Schema::create('bulidings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bu_name', 100);
            $table->string('bu_price', 20);
            $table->boolean('bu_type');
            $table->integer('bu_rooms');
            $table->boolean('bu_rent');
            $table->text('bu_small_dis', 160);
            $table->string('bu_square', 10);
            $table->text('bu_meta', 200);
            $table->string('bu_langtude', 50);
            $table->string('bu_latitude', 50);
            $table->text('bu_large_dis', 255);
            $table->boolean('bu_status');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bulidings');
    }
}
