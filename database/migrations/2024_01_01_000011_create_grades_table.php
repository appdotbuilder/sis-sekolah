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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('assignment_id')->nullable()->constrained('assignments')->onDelete('cascade');
            $table->decimal('score', 5, 2)->comment('Numeric score');
            $table->string('grade')->nullable()->comment('Letter grade A, B, C, D, E');
            $table->enum('type', ['quiz', 'assignment', 'midterm', 'final', 'project'])->default('assignment');
            $table->string('semester')->comment('Academic semester');
            $table->string('academic_year')->comment('Academic year');
            $table->text('notes')->nullable()->comment('Teacher notes');
            $table->timestamps();
            
            $table->index(['student_id', 'subject_id']);
            $table->index(['student_id', 'semester', 'academic_year']);
            $table->index('assignment_id');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};