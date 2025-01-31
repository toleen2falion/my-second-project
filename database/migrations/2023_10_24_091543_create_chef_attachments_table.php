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
        Schema::create('chef_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 999);
            $table->string('chef_name', 50);
            $table->unsignedBigInteger('chef_id')->nullable();
            $table->foreign('chef_id')->references('id')->on('chefs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef_attachments');
    }
};
