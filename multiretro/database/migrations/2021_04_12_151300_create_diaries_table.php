<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            //időjárás jelentés
            $table->json('weather_report')->nullable();            
            //form
            $table->json('form')->nullable(); //kulcs-érték párok szerint szétszedni
            //plus_minus
            $table->json('plus_minus')->nullable(); //plus_minus_task_id-k vannak benne
            //kanban
            $table->json('kanban')->nullable(); //actionpoint_id-k vannak benne

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
        Schema::dropIfExists('diaries');
    }
}
