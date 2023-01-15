<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyJacReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_jac_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('week');
            $table->integer('jac13')->nullable();
            $table->integer('jac14')->nullable();
            $table->integer('jac15')->nullable();
            $table->integer('jac16')->nullable();
            $table->integer('jac17')->nullable();
            $table->integer('jac18')->nullable();
            $table->integer('jac19')->nullable();
            $table->integer('jac23')->nullable();
            $table->integer('jac24')->nullable();
            $table->integer('jac25')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('weekly_jac_reports');
    }
}
