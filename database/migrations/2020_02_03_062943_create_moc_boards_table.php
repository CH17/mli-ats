<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMocBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moc_boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->nullable();
            $table->string('board')->nullable();
            $table->string('board_code')->nullable();
            $table->string('moc_code')->nullable();
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
        Schema::dropIfExists('moc_boards');
    }
}
