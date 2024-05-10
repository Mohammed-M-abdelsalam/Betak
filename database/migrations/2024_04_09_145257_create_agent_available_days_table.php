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
        Schema::create('agent_available_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId("agent_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("available_days_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_available_days');
    }
};
