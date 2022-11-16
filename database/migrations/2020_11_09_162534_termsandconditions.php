<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Termsandconditions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termsandconditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longtext('heading_english');
            $table->longtext('heading_arabic');
            $table->longtext('paragraph_english');
            $table->longtext('paragraph_arabic');
            $table->string('important');
            $table->timestamps();
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
