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
        CREATE PROCEDURE createCommandeArticle(IN idUsager INT, IN idArticleCampagne INT, IN _quantite INT, IN idCampagne INT)
BEGIN
    DECLARE idCommande INT;

    CALL createCommande(idUsager);

    SET idCommande = LAST_INSERT_ID();

    IF (SELECT statut FROM campagnes WHERE id = idCampagne) = 'en cours' THEN
        INSERT INTO article_campagne_commande (commande_id, article_campagne_id, quantite, created_at, updated_at)
        VALUES (idCommande, idArticleCampagne, _quantite, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La campagne est terminée';
    END IF;

END";
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
