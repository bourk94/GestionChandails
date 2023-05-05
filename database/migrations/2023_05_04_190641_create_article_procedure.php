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
        $procedure = "DROP PROCEDURE IF EXISTS `createArticle`;
        CREATE PROCEDURE createArticle(
            IN nom VARCHAR(255),
            IN type VARCHAR(255),
            IN description TEXT
        )
        BEGIN
            INSERT INTO articles(nom, type, description, created_at, updated_at)
            VALUES (nom, type, description, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
        END";
        DB::unprepared($procedure);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS `createArticle`;";
        DB::unprepared($procedure);
    }
};
