<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presents', function (Blueprint $table) {
            $table->id();
                $table->text('teacher_p');
                $table->text('attend_p');
                $table->text('class_p');
                $table->text('meet_p');
                $table->date('date_p');
                $table->text('subject_p');
                $table->text('topic_p');
                $table->integer('student_p');
                $table->integer('student_s_p');
                $table->integer('student_i_p');
                $table->integer('student_a_p');
                $table->text('student_s_k_p');
                $table->text('student_i_k_p');
                $table->text('student_a_k_p');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presents');
    }
};
