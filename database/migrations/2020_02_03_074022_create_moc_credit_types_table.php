<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMocCreditTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moc_credit_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('moc_board_id');
            $table->integer('order')->nullable();
            $table->string('credit_type')->nullable();
            $table->float('credit_amount')->nullable();
            $table->timestamps();

            $table->foreign('moc_board_id')->references('id')->on('moc_boards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moc_credit_types');
    }
}
