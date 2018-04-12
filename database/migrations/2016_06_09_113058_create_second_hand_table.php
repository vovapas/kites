<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondHandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_hand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_category');
            $table->integer('price');
            $table->text('description');
            $table->string('picture');
            $table->string('user_name');
            $table->string('user_town');
            $table->string('user_phone');


            $table->softDeletes();
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
        Schema::drop('second_hand');
    }
}
