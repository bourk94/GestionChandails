<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `createCommandeArticle`;
        CREATE PROCEDURE createCommandeArticle(IN idCommande INT, IN idUsager INT, IN idArticleCampagne INT, IN _quantite INT, IN _montantTotal DECIMAL(10,2))
        BEGIN
        DECLARE idCampagne INT;
    
        SELECT id into idCampagne FROM campagnes WHERE statut = 'en cours';
        INSERT INTO article_campagne_commande (commande_id, article_campagne_id, quantite, montant_total,  created_at, updated_at)
        VALUES (idCommande, idArticleCampagne, _quantite, _montantTotal, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
    
    
    END;";
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `createCommandeArticle`;";
        DB::unprepared($procedure);
    }
};
