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
        Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade');
        $table->string('nom');
        $table->string('prenom');
        $table->string('cin');
        $table->string('permis');
        $table->string('img_cin')->nullable();
        $table->string('img_permis')->nullable();
        $table->string('tele');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
