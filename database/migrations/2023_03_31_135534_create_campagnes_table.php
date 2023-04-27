<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //On doit ajouter les champs de progression et statut 


    public function up(): void
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('campagnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_campagne')->unique();
            $table->date('date_debut_campagne');
            $table->date('date_fin_campagne');
            $table->date('date_debut_collecte');
            $table->date('date_fin_collecte');
            $table->unsignedBigInteger('administrateur_id_creation');
            $table->string('progression')->default("intention d\'achat");
            $table->string('statut')->default('en cours');
            $table->foreign('administrateur_id_creation')->references('id')->on('usagers');
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
