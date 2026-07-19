<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nom_fr' => 'Lois',
                'nom_ar' => 'القوانين'
            ],
            [
                'nom_fr' => 'Décrets',
                'nom_ar' => 'المراسيم'
            ],
            [
                'nom_fr' => 'Arrêtés',
                'nom_ar' => 'القرارات'
            ],
            [
                'nom_fr' => 'Circulaires',
                'nom_ar' => 'الدوريات'
            ],
        ]);
    }
}