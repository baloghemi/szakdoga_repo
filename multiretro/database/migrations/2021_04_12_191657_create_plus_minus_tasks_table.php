<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlusMinusTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plus_minus_tasks', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->integer('positive')->default('0');
            $table->integer('negative')->default('0');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('meeting_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');  
            $table->foreign('meeting_id')->references('id')->on('meetings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plus_minus_tasks');
    }
}
