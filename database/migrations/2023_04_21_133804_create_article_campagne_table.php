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
            $table->string('image')->nullable()->default('null');
            $table->foreignId('couleur_id')->constrained('couleurs')->onDelete('cascade');
            $table->foreignId('taille_id')->constrained('tailles')->onDelete('cascade');
            $table->integer('quantite_max')->default(5);
            $table->double('prix')->nullable();
            //$table->primary(['article_id', 'campagne_id'],'id');
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
