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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('organizer');
            $table->text('description');
            $table->string('registration_link')->nullable();
            $table->string('guidebook_link')->nullable();
            $table->integer('registration_fee')->default(0);
            $table->string('photo_url')->nullable();
            $table->boolean('is_public')->default(true);
            $table->date('deadline')->nullable();
            $table->foreignId('category_id')->constrained('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
