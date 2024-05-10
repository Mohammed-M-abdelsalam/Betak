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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime("date");
            $table->string("preview_day", 20);
            $table->enum("status", [0, 1, 2])->default(1);
            $table->foreignId("user_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("property_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
