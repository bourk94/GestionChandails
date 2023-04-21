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
        Schema::create('article_campagne', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained('articles');
            $table->foreignId('campagne_id')->constrained('campagnes');
            $table->string('image');
            $table->foreignId('couleur_id')->constrained('couleurs');
            $table->foreignId('taille_id')->constrained('tailles');
            $table->index(['article_id', 'campagne_id', 'id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_campagne');
    }
};
