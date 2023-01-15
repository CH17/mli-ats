<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->dateTime('status_active_at')->nullable();
            $table->string('activity_id')->nullable();
            $table->string('activity_url')->nullable();
            $table->unsignedBigInteger('jp_id')->nullable();
            $table->unsignedBigInteger('jp_id_2')->nullable();
            $table->unsignedBigInteger('jp_contact_id')->nullable();
            $table->string('jp_cr_code')->nullable();
            $table->boolean('is_collaborating_org')->default(0);
            $table->text('collaborating_org_name')->nullable();
            $table->string('accreditation_type_4_ipce')->nullable();
            $table->integer('moc')->nullable();
            $table->integer('ol3_knowledge')->nullable();
            $table->integer('ol4_competence')->nullable();
            $table->integer('ol5_performance')->nullable();
            $table->integer('ol6_patient_outcomes')->nullable();
            $table->integer('ol7_community_health')->nullable();
            $table->text('related_documents')->nullable();
            $table->boolean('is_ats_form_ready')->default(0);
            $table->string('doa_or_ed_notes', 2000)->nullable();
            $table->text('notes')->nullable();
            $table->string('ta_keywords', 250)->nullable();
            $table->integer('jac13')->nullable();
            //    $table->string('jac13_description', 250)->nullable();
            $table->integer('jac14')->nullable();
            //    $table->string('jac14_description', 250)->nullable();
            $table->integer('jac17')->nullable();
            //$table->string('jac17_description', 250)->nullable();
            $table->integer('jac18')->nullable();
            //$table->string('jac18_description', 250)->nullable();
            $table->integer('jac19')->nullable();
            // $table->string('jac19_description', 2000)->nullable();
            $table->integer('jac24')->nullable();
            //$table->string('jac24_description', 500)->nullable();
            $table->integer('jac25')->nullable();
            // $table->string('jac25_description', 500)->nullable();
            $table->string('description', 250)->nullable();
            $table->float('course_credit_amount', 11, 2)->nullable();
            $table->string('project_code')->nullable();
            $table->text('activity_title');
            $table->date('start_date');
            $table->date('expiration_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('activity_type', 50)->nullable();
            $table->string('providership', 50)->nullable();
            $table->string('has_commercial_support', 10)->nullable();
            $table->string('target_audience', 1024)->nullable();
            $table->string('target_audience_other_reason', 512)->nullable();
            // $table->text('practice_gaps')->nullable();
            // $table->text('knowledge_need')->nullable();
            // $table->text('skills_need')->nullable();
            // $table->text('performance_need')->nullable();
            // $table->text('activity_designed')->nullable();
            // $table->text('learning_objectives')->nullable();
            // $table->text('ensure_activity')->nullable();
            // $table->text('educational_format')->nullable();
            // $table->string('planned_strategies', 512)->nullable();
            // $table->text('barriers_strategies')->nullable();
            // $table->string('barriers_strategies_other', 512)->nullable();

            // $table->text('medicine_institutes')->nullable();
            // $table->text('collaborative_practices')->nullable();
            // $table->text('acgme_abms_competencies')->nullable();
            // $table->text('cape_competencies')->nullable();
            // $table->text('national_quality_strategy')->nullable();
            // $table->string('other_competencies', 512)->nullable();

            // $table->text('controll_individuals')->nullable();
            // $table->text('commercial_supporters')->nullable();
            $table->boolean('has_loa')->default(0);
            // $table->text('attachments')->nullable();
            // $table->text('support_attachments')->nullable();
            // $table->text('dis_attachments')->nullable();
            $table->boolean('has_attachment_4')->default(0);
            $table->boolean('has_attachment_6')->default(0);


            $table->bigInteger('managed_by')->nullable();
            $table->bigInteger('assigned_to')->nullable();
            $table->bigInteger('used_by')->nullable();

            $table->string('status')->nullable();

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
        Schema::dropIfExists('projects');
    }
}
