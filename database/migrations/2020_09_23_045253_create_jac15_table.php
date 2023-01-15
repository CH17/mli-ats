<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJac15Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jac15', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('add_date')->nullable();
            $table->string('year_quarter', 15)->nullable();
            $table->string('ipce_team', 500)->nullable();
            $table->string('cpd_need', 500)->nullable();
            $table->string('learning_plan', 500)->nullable();
            $table->string('int_ext', 50)->nullable();
            $table->string('time_resources', 500)->nullable();
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
        Schema::dropIfExists('jac15');
    }
}
