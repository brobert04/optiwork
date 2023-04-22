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

        Schema::create('chatlog', function (Blueprint $table){
            $table->id();
            $table->uuid('chat_uuid')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->json('continut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatlog');
    }
};
