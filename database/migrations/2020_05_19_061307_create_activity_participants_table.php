<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->integer('batch')->nullable();
            $table->string('cr_code', 40)->nullable();
            $table->date('date_of_participation')->nullable();
            $table->string('credit_issued', 40)->nullable();
            $table->string('first_name', 120)->nullable();
            $table->string('last_name', 120)->nullable();
            $table->string('degree', 120)->nullable();
            $table->string('profession', 120)->nullable();
            $table->string('specialty', 120)->nullable();
            $table->string('city', 120)->nullable();
            $table->string('state', 120)->nullable();
            $table->string('zip', 40)->nullable();
            $table->string('country', 120)->nullable();
            $table->decimal('credit_claimed')->nullable();
            $table->string('dob', 20)->nullable();
            $table->string('certboard', 40)->nullable();
            $table->string('part_moc_board_id', 40)->nullable();
            $table->string('license_number', 120)->nullable();
            $table->string('nabp_eprofile', 120)->nullable();
            $table->string('npi', 120)->nullable();
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
        Schema::dropIfExists('activity_participants');
    }
}
