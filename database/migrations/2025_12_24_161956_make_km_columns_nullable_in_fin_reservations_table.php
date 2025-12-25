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
        Schema::table('reservation_fins', function (Blueprint $table) {
            $table->integer('km_fin')->nullable()->change();
            $table->integer('km_total')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation_fins', function (Blueprint $table) {
            $table->integer('km_fin')->nullable(false)->change();
            $table->integer('km_total')->nullable(false)->change();
        });
    }
};
