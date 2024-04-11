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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('type');
            $table->string('pattern');
            $table->string('country');
            $table->string('cost');
            $table->integer('cookTime');
            $table->integer('numberIndividual');
            $table->text('description')->nullable();
          
            $table->unsignedBigInteger('chef_id')->nullable();
            $table->foreign('chef_id')->references('id')->on('chefs')->onDelete('cascade');

            $table->boolean('state');

            $table->double('calories')->nullable();
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
        Schema::dropIfExists('dishes');
    }
};
