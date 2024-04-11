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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('servingSize')->nullable();
            $table->integer('calories')->nullable();
            $table->double('totalFat')->nullable();
            $table->double('cholesterol')->nullable();
            $table->double('sodium')->nullable();
            $table->double('vitaminA')->nullable();
            $table->double('vitaminC')->nullable();
            $table->double('protein')->nullable();
            $table->double('sugars')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
