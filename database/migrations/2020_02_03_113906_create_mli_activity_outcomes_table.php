<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMliActivityOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mli_activity_outcomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cr_activity_credit_type_record')->nullable();
            $table->integer('participant_by_credit_type_count')->nullable();
            $table->float('pre_score')->nullable();
            $table->integer('pre_count')->nullable();
            $table->float('pre_stdev')->nullable();
            $table->float('post_score')->nullable();
            $table->integer('post_count')->nullable();
            $table->float('post_stdev')->nullable();
            $table->float('effect_size')->nullable();
            $table->float('itc_change_pctg')->nullable();
            $table->float('loif_change_pctg')->nullable();
            $table->float('pif_change_pctg')->nullable();
            $table->float('po_improvement_factor_change')->nullable();
            $table->float('comm_health_improvement_factor_change')->nullable();
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
        Schema::dropIfExists('mli_activity_outcomes');
    }
}
