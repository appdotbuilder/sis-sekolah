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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable()->comment('Featured image path');
            $table->enum('type', ['general', 'academic', 'event', 'urgent'])->default('general');
            $table->enum('target_audience', ['all', 'students', 'teachers', 'parents'])->default('all');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(false);
            $table->datetime('published_at')->nullable();
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('type');
            $table->index('target_audience');
            $table->index('is_featured');
            $table->index('is_published');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};