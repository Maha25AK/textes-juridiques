<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('domaines', function (Blueprint $table) {
            $table->foreignId('categorie_id')
                  ->constrained()
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('domaines', function (Blueprint $table) {
            $table->dropForeign(['categorie_id']);
            $table->dropColumn('categorie_id');
        });
    }
};