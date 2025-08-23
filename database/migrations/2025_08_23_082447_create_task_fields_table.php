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
        Schema::create('task_fields', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('student_task_id')->constrained('student_tasks')->cascadeOnDelete();
            $table->integer('order');
            $table->string('url')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_fields');
    }
};
