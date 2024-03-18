<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('phone');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('email');
            $table->string('password');
            $table->string('park');
            $table->integer('car_id');
            $table->integer('type_id');
            $table->string('color');
            $table->string('plate_number');
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
