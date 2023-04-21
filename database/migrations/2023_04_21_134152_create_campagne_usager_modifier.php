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
        Schema::create('campagne_usager_modifier', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('usager_id')->constrained('usagers');
            $table->foreignId('campagne_id')->constrained('campagnes');
            $table->primary(['usager_id', 'campagne_id'],'campagne_usager_modifier_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campagne_usager_modififier');
    }
};
