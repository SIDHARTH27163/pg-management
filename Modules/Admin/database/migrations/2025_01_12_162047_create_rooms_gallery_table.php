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
        Schema::create('rooms_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id'); // Foreign key to `rooms` table
            $table->string('gallery_image_path');
            $table->timestamps();
        
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms_gallery');
    }
};
