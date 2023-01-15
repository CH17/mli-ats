<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyStatusReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_status_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('week');
            $table->integer('proposed')->nullable();
            $table->integer('new')->nullable();
            $table->integer('planning')->nullable();
            $table->integer('ready')->nullable();
            $table->integer('active')->nullable();
            $table->integer('analysis')->nullable();
            $table->integer('audit')->nullable();
            $table->integer('approved')->nullable();
            $table->integer('total')->nullable();
            $table->integer('closed')->nullable();
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
        Schema::dropIfExists('weekly_status_reports');
    }
}
