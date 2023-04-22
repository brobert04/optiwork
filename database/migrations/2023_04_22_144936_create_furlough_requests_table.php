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
        Schema::create('furlough_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('comments')->nullable();
            $table->string('status')->default(0);
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->string('employer_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furlough_requests');
    }
};
