<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('textes_juridiques', function (Blueprint $table) {
            $table->text('titre_fr')->change();
            $table->text('titre_ar')->change();
        });
    }

    public function down(): void
    {
        Schema::table('textes_juridiques', function (Blueprint $table) {
            $table->string('titre_fr')->change();
            $table->string('titre_ar')->change();
        });
    }
};