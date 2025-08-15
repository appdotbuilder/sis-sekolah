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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nip')->unique()->comment('Teacher identification number');
            $table->string('specialization')->comment('Teaching specialization');
            $table->text('qualifications')->nullable()->comment('Educational qualifications');
            $table->date('hire_date')->comment('Date of employment');
            $table->decimal('salary', 10, 2)->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_homeroom_teacher')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->unique('user_id');
            $table->index('nip');
            $table->index('specialization');
            $table->index('is_homeroom_teacher');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};