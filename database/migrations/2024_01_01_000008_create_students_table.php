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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('set null');
            $table->string('nis')->unique()->comment('Student identification number');
            $table->string('nisn')->unique()->comment('National student identification number');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['male', 'female']);
            $table->text('address')->nullable();
            $table->string('parent_name')->comment('Parent/guardian name');
            $table->string('parent_phone')->comment('Parent/guardian phone');
            $table->string('parent_email')->nullable()->comment('Parent/guardian email');
            $table->date('enrollment_date')->comment('Date of enrollment');
            $table->enum('status', ['active', 'inactive', 'graduated', 'transferred'])->default('active');
            $table->timestamps();
            
            $table->unique('user_id');
            $table->index('nis');
            $table->index('nisn');
            $table->index('class_id');
            $table->index('status');
            $table->index('enrollment_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};