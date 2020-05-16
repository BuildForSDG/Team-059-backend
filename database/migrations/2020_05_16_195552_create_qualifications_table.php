<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->index('teacher_id');
            $table->string('type')->comment('e.g. B.Sc. M.Sc. SSCE');
            $table->string('school_name');
            $table->string('school_city');
            $table->string('school_state');
            $table->string('school_country');
            $table->string('course');
            $table->datetime('year_admitted');
            $table->datetime('year_graduated');
            $table->string('mat_no');
            $table->string('id_card_url');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}
