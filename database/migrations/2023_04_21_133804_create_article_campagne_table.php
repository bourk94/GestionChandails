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
            $table->string('image')->nullable();
            $table->unsignedBigInteger('couleur');
            $table->foreign('couleur')->references('id')->on('couleurs')->onDelete('cascade');
            $table->unsignedBigInteger('taille');
            $table->foreign('taille')->references('id')->on('tailles')->onDelete('cascade');
            $table->integer('quantite_max')->default(0); 
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
