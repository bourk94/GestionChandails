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
        $procedure = "DROP PROCEDURE IF EXISTS `createCommande`;
        CREATE PROCEDURE `createCommande`(IN idUsager INT)
        BEGIN
     INSERT INTO `commandes` (usager_id, date_commande, created_at, updated_at)
        VALUES (idUsager, NOW(), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
         END";
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `createCommande`;";
        DB::unprepared($procedure);
    }
};
