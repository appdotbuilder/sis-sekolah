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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Class name like X-A, XI-IPA-1');
            $table->string('level')->comment('Grade level: 10, 11, 12');
            $table->string('major')->nullable()->comment('Major: IPA, IPS, etc');
            $table->text('description')->nullable();
            $table->integer('capacity')->default(30)->comment('Maximum students');
            $table->integer('current_students')->default(0)->comment('Current student count');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('name');
            $table->index('level');
            $table->index('major');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};