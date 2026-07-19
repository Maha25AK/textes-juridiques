<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('textes_juridiques', function (Blueprint $table) {
        $table->id();

        $table->string('titre_fr');
        $table->string('titre_ar');

        $table->string('numero')->unique();

        $table->date('date_publication');

        $table->longText('contenu_fr');
        $table->longText('contenu_ar');

        $table->string('lien_pdf');

        $table->foreignId('categorie_id')
              ->constrained('categories')
              ->cascadeOnDelete();

        $table->foreignId('domaine_id')
              ->constrained('domaines')
              ->cascadeOnDelete();

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('texte_juridiques');
    }
};
