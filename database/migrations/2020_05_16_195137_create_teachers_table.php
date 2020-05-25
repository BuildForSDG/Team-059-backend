<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->boolean('student_teacher')
                  ->comment('Are you currently running any programme that will qualify you to be a professional teacher?');
            $table->boolean('certified_teacher')
                  ->comment('Have you been certified as a Teacher? e.g by a teacher certification body');
            $table->enum('teaching_status', ['currently teaching', 'retired teacher', 'ex-teacher', 'never practised'])
                  ->comment(' Currently Teaching | Retired Teacher | Ex-Teacher | Never Practised');
            $table->boolean('employed')->comment('Are you employed in another sector');
            $table->enum('employment_category', ['self-employed', 'employee', 'employer'])
                  ->comment('if you are a retired teacher, ex-teacher or have never practised and you are employed, select your employment category.');
            $table->boolean('love_teaching')->comment('Do you love teaching?');
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
        Schema::dropIfExists('teachers');
    }
}
