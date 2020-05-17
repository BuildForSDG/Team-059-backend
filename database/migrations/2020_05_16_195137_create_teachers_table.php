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
            $table->enum('type', ['student', 'certified'])
                  ->comment('Student Teacher | Certified Teacher');
            $table->enum('status', ['retired', 'practicing', 'amature'])
                  ->comment('Retired | Practicing | Amature');
            $table->boolean('employed');
            $table->enum('employment_status', ['self-employed', 'unemployed', 'employee', 'employer']);
            $table->boolean('love_teaching');
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
