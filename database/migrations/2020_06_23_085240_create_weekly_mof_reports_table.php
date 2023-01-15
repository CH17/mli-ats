<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyMofReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_mof_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('week');
            $table->integer('expired_but_active')->nullable();
            $table->integer('analysis')->nullable();
            $table->integer('total_expired')->nullable();
            $table->integer('one_pager_produced')->nullable();
            $table->integer('one_pager_in_route')->nullable();
            $table->integer('one_pager_attach4')->nullable();
            $table->integer('mof_uploaded')->nullable();
            $table->integer('participation_uploaded')->nullable();
            $table->integer('income_report_attach6')->nullable();             
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
        Schema::dropIfExists('weekly_mof_reports');
    }
}
