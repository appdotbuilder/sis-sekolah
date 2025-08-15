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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('Subject code like MTK001');
            $table->string('name')->comment('Subject name');
            $table->text('description')->nullable();
            $table->integer('credits')->default(2)->comment('Credit hours');
            $table->boolean('is_mandatory')->default(true)->comment('Is this a mandatory subject');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('code');
            $table->index('name');
            $table->index('is_mandatory');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};