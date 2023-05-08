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
        $procedure = "DROP PROCEDURE IF EXISTS `createArticleCampagne`;
        CREATE PROCEDURE createArticleCampagne(
            IN _prix DOUBLE,
            IN idArticle INT,
            IN idCampagne INT,
            IN idCouleur INT,
            IN idTaille INT
        )
        BEGIN
        
            INSERT INTO article_campagne(article_id, campagne_id, couleur, taille, prix, created_at, updated_at)
            VALUES (idArticle, idCampagne, idCouleur, idTaille,  _prix, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
        END";
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `createArticleCampagne`;";
        DB::unprepared($procedure);
    }
};
