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
        Schema::create('campagnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_campagne')->unique();
            $table->date('date_debut_campagne');
            $table->date('date_fin_campagne');
            $table->date('date_debut_collecte');
            $table->date('date_fin_collecte');
            $table->int('administrateur_id_creation')->foreignId('administrateur_id')->constrained('administrateurs');
            $table->int('administrateur_id_modification')->foreignId('administrateur_id')->constrained('administrateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campagnes');
    }
};
