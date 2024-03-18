<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title1');
            $table->string('title2');
            $table->text('description1');
            $table->text('description2');
            $table->string('lang');
            $table->integer('about_id');
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
        Schema::dropIfExists('about_trans');
    }
}
