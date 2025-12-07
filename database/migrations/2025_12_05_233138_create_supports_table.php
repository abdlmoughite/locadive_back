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
        Schema::create('supports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade');
        $table->string('nom');
        $table->string('prenom');
        $table->string('cin');
        $table->decimal('salaire');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('img_cin')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
