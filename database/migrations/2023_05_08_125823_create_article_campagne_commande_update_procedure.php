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
       $procedure = "DROP PROCEDURE IF EXISTS `updateStatutArticleCampagneCommande`;
       CREATE PROCEDURE updateStatutArticleCampagneCommande(IN idArticleCampagneCommande INT, IN statut VARCHAR(255))
       BEGIN
           UPDATE article_campagne_commande
           SET statut = statut
           WHERE id = idArticleCampagneCommande;
       END";
       
        DB::unprepared($procedure);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `updateStatutArticleCampagneCommande`;";
        DB::unprepared($procedure);
    }
};
