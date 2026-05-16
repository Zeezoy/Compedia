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
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('organizer', 150)->nullable();
            $table->string('poster_url', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('deadline');
            $table->string('prize', 100)->nullable();
            $table->string('source_url', 255)->nullable();
            $table->enum('status', ['aktif', 'ditutup', 'draft'])->default('aktif');
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitons');
    }
};
