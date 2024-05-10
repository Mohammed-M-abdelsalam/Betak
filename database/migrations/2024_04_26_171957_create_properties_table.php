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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer("size");
            $table->decimal("price", 10, 2);
            $table->text("description_en")->nullable();
            $table->text("description_ar")->nullable();
            $table->enum("status", [0, 1])->default(1);
            $table->integer("bedrooms");
            $table->string("location_link");
            $table->foreignId("category_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("agent_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("location_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("compound_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
