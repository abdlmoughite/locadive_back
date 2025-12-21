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
        Schema::create('voitures', function (Blueprint $table) {
        $table->id();
        $table->foreignId('agency_id')->constrained('agencies')->onDelete('cascade');
        $table->string('model');
        $table->integer('annee');
        $table->string('etat');
        $table->string('matricule')->unique();
        $table->string('color');
        $table->string('description')->nullable();
        $table->string('options')->nullable();
        $table->decimal('prix_jour');
        $table->string('assurance');
        $table->string('carte_grise');
        $table->string('img')->nullable();
        $table->string('status')->default('Disponible');
        $table->integer('km_debut');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
