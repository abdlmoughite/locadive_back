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
        Schema::table('preparations', function (Blueprint $table) {
                 $table->unsignedBigInteger('agency_id')
              ->nullable()
              ->after('voiture_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preparation', function (Blueprint $table) {
            //
        });
    }
};
