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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('room_type');
            $table->string('room_no')->unique();
            $table->integer('number_of_tenants');
            $table->boolean('bathroom')->default(true);
            $table->boolean('balconies')->default(false);
            $table->integer('capacity'); // Number of people
            $table->boolean('availability')->default(true); // Available or not
            $table->decimal('rent', 10, 2); // Monthly rent
            $table->text('additional_charges'); // Additional charges
            $table->text('description'); // Monthly rent
            $table->timestamps();
        });
        Schema::create('room_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id'); // Foreign key to `rooms` table
            $table->string('feature'); // e.g., AC, TV, WiFi
            $table->timestamps();
        
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });

        Schema::create('room_rules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id'); // Foreign key to `rooms` table
            $table->string('rule'); // e.g., No Smoking, No Pets
            $table->timestamps();
        
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });

        Schema::create('room_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id'); // Foreign key to `rooms` table
            $table->string('cover_image_path');
            $table->timestamps();
        
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
