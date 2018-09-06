<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsesTable extends Migration
{
    public function up()
    {
        Schema::create('contact_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('co_name', 100);
            $table->string('co_email');
            $table->string('co_subject', 100);
            $table->string('co_message', 300);
            $table->string('co_view')->default('No');
            $table->string('co_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_uses');
    }
}
