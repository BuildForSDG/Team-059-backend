<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['private', 'government', 'mission'])
                  ->comment('Private | Government | Missions');
            $table->string('name')->index('name');
            $table->string('country')->index('country');
            $table->string('state')->index('state');
            $table->string('city')->index('city');
            $table->string('street');
            $table->string('pobox');
            $table->enum('grade', ['nursery', 'primary', 'secondary'])
                  ->comment('Nursery | Primary | Secondary');
            $table->enum('region', ['rural', 'urban'])->comment('Rural | Urban');
            $table->string('students_count');
            $table->string('academic_teachers_count');
            $table->string('non_academic_teachers_count');
            $table->string('proprietor_name');
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
        Schema::dropIfExists('schools');
    }
}
