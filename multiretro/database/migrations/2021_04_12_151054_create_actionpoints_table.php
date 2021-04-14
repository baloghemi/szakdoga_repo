<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionpoints', function (Blueprint $table) {
            $table->id();            
            $table->longText('description');
            $table->enum('status', ['to_do', 'doing', 'done'])->default('to_do');
            $table->date('act_date');
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
        Schema::dropIfExists('actionpoints');
    }
}
