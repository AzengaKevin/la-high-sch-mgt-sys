<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('admission_number')->unique();
            $table->foreignId('stream_id');
            $table->integer('kcpe_marks');
            $table->char('kcpe_grade', 2);
            $table->date('dob');
            $table->date('join_date');
            $table->unsignedBigInteger('join_level_id');
            $table->timestamps();

            $table->foreign('join_level_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
