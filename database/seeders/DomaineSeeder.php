<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Domaine;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lois = Categorie::where('nom_fr', 'Lois')->first();
        $decrets = Categorie::where('nom_fr', 'Décrets')->first();
        $arretes = Categorie::where('nom_fr', 'Arrêtés')->first();
        $circulaires = Categorie::where('nom_fr', 'Circulaires')->first();

        Domaine::insert([
            [
                'nom_fr' => 'Urbanisme',
                'nom_ar' => 'التعمير',
                'categorie_id' => $lois->id,
            ],
            [
                'nom_fr' => 'Habitat',
                'nom_ar' => 'السكن',
                'categorie_id' => $lois->id,
            ],
            [
                'nom_fr' => 'Aménagement du Territoire',
                'nom_ar' => 'إعداد التراب الوطني',
                'categorie_id' => $lois->id,
            ],
            [
                'nom_fr' => 'Urbanisme',
                'nom_ar' => 'التعمير',
                'categorie_id' => $decrets->id,
            ],
            [
                'nom_fr' => 'Habitat',
                'nom_ar' => 'السكن',
                'categorie_id' => $decrets->id,
            ],
            [
                'nom_fr' => 'Professionnels',
                'nom_ar' => 'المهنيون',
                'categorie_id' => $arretes->id,
            ],
            [
                'nom_fr' => 'Environnement',
                'nom_ar' => 'البيئة',
                'categorie_id' => $circulaires->id,
            ],
        ]);
    }
}