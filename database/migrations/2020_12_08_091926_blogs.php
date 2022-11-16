<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('tittle');
            $table->string('blogdate');
            $table->longtext('description');
            $table->string('blogtags');
            $table->int('blogcategoryid');
            $table->longtext('mettatittle');
            $table->longtext('metadescription');
            $table->longtext('ogtittle');
            $table->longtext('ogdescription');
            $table->longtext('og_image');
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
