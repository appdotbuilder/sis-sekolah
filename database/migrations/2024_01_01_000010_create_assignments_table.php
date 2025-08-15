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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('instructions')->nullable();
            $table->datetime('due_date');
            $table->integer('max_score')->default(100);
            $table->string('attachment')->nullable()->comment('File attachment path');
            $table->enum('type', ['homework', 'project', 'quiz', 'exam'])->default('homework');
            $table->enum('status', ['draft', 'published', 'closed'])->default('draft');
            $table->timestamps();
            
            $table->index(['class_id', 'subject_id']);
            $table->index('teacher_id');
            $table->index('due_date');
            $table->index('type');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};