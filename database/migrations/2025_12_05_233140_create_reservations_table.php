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
  Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
        $table->foreignId('voiture_id')->constrained('voitures')->onDelete('cascade');
        $table->date('date_debut');
        $table->date('date_fin');
        $table->string('img_etat')->nullable();
        $table->decimal('prix');
        $table->string('contrat')->nullable();
        $table->string('status');
        $table->decimal('prix_total');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
