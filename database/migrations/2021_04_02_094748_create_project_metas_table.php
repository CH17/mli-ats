<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');

            $table->text('support_attachments')->nullable();
            $table->text('dis_attachments')->nullable();
            $table->text('attachments')->nullable();

            $table->text('medicine_institutes')->nullable();
            $table->text('collaborative_practices')->nullable();
            $table->text('acgme_abms_competencies')->nullable();
            $table->text('cape_competencies')->nullable();
            $table->text('national_quality_strategy')->nullable();
            $table->string('other_competencies', 512)->nullable();

            $table->text('controll_individuals')->nullable();
            $table->text('commercial_supporters')->nullable();

            $table->text('practice_gaps')->nullable();
            $table->text('knowledge_need')->nullable();
            $table->text('skills_need')->nullable();
            $table->text('performance_need')->nullable();
            $table->text('activity_designed')->nullable();
            $table->text('learning_objectives')->nullable();
            $table->text('ensure_activity')->nullable();
            $table->text('educational_format')->nullable();
            $table->text('activity_matches')->nullable();
            $table->text('planned_strategies')->nullable();
            $table->text('barriers_strategies')->nullable();
            $table->text('barriers_strategies_other')->nullable();

            $table->text('target_audience_other_reason')->nullable();
            $table->text('target_audience')->nullable();


            $table->text('jac25_description')->nullable();
            $table->text('jac24_description')->nullable();
            $table->text('jac23_description')->nullable();
            $table->text('jac19_description')->nullable();
            $table->text('jac18_description')->nullable();
            $table->text('jac17_description')->nullable();
            $table->text('jac14_description')->nullable();
            $table->text('jac13_description')->nullable();

            $table->string('jac13_patient_planner', 400)->nullable();
            $table->string('jac13_patient_presenter', 400)->nullable();
            $table->text('jac13_mechanism')->nullable();
            $table->string('jac14_patient_planner', 400)->nullable();
            $table->string('jac14_patient_presenter', 400)->nullable();
            $table->text('jac14_mechanism')->nullable();

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
        Schema::dropIfExists('project_metas');
    }
}
