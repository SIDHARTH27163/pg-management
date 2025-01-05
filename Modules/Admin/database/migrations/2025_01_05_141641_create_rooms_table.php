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
            $table->string('room_type'); // e.g., Private Room, Studio
            $table->integer('number_of_rooms');
            $table->integer('bathrooms');
            $table->integer('balconies')->nullable();
            $table->integer('capacity'); // Number of people
            $table->boolean('availability')->default(true); // Available or not
            $table->decimal('rent', 10, 2); // Monthly rent
            $table->decimal('additional_charges', 10, 2)->nullable(); // Additional charges
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
            $table->string('image_path'); // Path to the image
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
