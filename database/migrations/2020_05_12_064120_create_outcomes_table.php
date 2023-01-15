<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->integer('batch')->nullable();
            $table->boolean('include')->default(0);
            $table->string('exclude_comments', 120)->nullable();
            $table->string('part_type', 40)->nullable();
            $table->boolean('moc')->default(0);
            $table->integer('attendee_pre_count')->nullable();
            $table->integer('attendee_post_count')->nullable();
            $table->integer('attendee_eval_count')->nullable();
            $table->decimal('bias')->nullable();
            $table->decimal('bias_target_min')->nullable();
            $table->boolean('bias_target_met')->default(0);       
            $table->boolean('c_measure')->default(1);
            $table->boolean('c_exclude')->default(0);
            $table->decimal('loif_rating')->nullable();
            $table->decimal('loif_target_min')->nullable();
            $table->boolean('loif_target_met')->default(0);
            $table->decimal('itc')->nullable();
            $table->decimal('itc_target_min')->nullable();
            $table->boolean('itc_target_met')->default(0);
            $table->decimal('pc')->nullable();
            $table->decimal('pc_target_min')->nullable();
            $table->boolean('pc_target_met')->default(0);
            $table->decimal('poc')->nullable();
            $table->decimal('poc_target_min')->nullable();
            $table->boolean('poc_target_greater_than_95')->default(0);
            $table->string('comments_on_competence', 120)->nullable();
            $table->boolean('p_measure')->default(0);
            $table->boolean('p_exclude')->default(0);
            $table->decimal('pif')->nullable();
            $table->decimal('pif_target')->nullable();
            $table->boolean('pif_met')->default(0);
            $table->string('comments_on_performance', 120)->nullable();
            $table->boolean('po_measure')->default(0);
            $table->boolean('po_exclude')->default(0);
            $table->decimal('poif')->nullable();
            $table->decimal('poif_target')->nullable();
            $table->boolean('poif_met')->default(0);
            $table->string('patient_outcomes_comments')->nullable();
            $table->decimal('eb_content')->nullable();
            $table->boolean('eb_content_target_greater_than_95')->default(0);
            $table->decimal('relevant_content')->nullable();
            $table->boolean('rel_content_target_greater_than_95')->default(0);
            $table->decimal('format_useful')->nullable();
            $table->boolean('format_target_greater_than_95')->default(0);
            $table->decimal('faculty')->nullable();
            $table->boolean('faculty_target_greater_than_95')->default(0);
            $table->decimal('interactive_learning')->nullable();
            $table->boolean('int_learning_target_greater_than_95')->default(0);
            $table->decimal('practice_strategies')->nullable();
            $table->boolean('ps_target_greater_than_95')->default(0);
            $table->boolean('barrier_identified')->default(0);
            $table->boolean('strategies_incorporated')->default(0);
            $table->integer('pre_count')->nullable();
            $table->decimal('pre_avg')->nullable();
            $table->decimal('pre_stdev')->nullable();
            $table->integer('post_count')->nullable();
            $table->decimal('post_avg')->nullable();
            $table->decimal('post_stdev')->nullable();
            $table->string('cohens_d', 120)->nullable();
            $table->decimal('planned_impact')->nullable();
            $table->decimal('actual_impact')->nullable();
            $table->integer('ccit')->nullable();
            $table->integer('ccit_target')->nullable();
            $table->string('role_collaborative_team_change')->nullable();
            $table->string('new_team_strategies')->nullable();
            $table->decimal('specific_action_factor')->nullable();
            $table->decimal('saf_target')->nullable();
            $table->string('ed_reach_disease')->nullable();
            $table->decimal('ed_reach_per_year')->nullable();
            $table->decimal('understand_roles_resp')->nullable();
            $table->decimal('apply_tools_techniques')->nullable();
            $table->decimal('work_collaborative_team')->nullable();
            $table->decimal('utilize_specialists_clinical_resources')->nullable();
            $table->decimal('other_choice_pctg')->nullable();
            $table->string('other_choice_text')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outcomes');
    }
}
