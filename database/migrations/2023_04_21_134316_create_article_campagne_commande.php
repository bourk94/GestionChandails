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
        Schema::create('article_campagne_commande', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('commande_id')->constrained('commandes');
            $table->foreignId('article_campagne_id')->constrained('article_campagne');
            $table->integer('quantite');
            $table->double('montant_total');
            $table->primary(['commande_id', 'article_campagne_id'],'article_campagne_commande_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_campagne_commande');
    }
};
