<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TexteJuridiqueSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('textes_juridiques')->insert([

            [
                'titre_fr' => 'Loi relative à l’urbanisme',
                'titre_ar' => 'قانون التعمير',
                'numero' => '12-90',
                'date_publication' => '1992-06-17',
                'contenu_fr' => 'Texte de démonstration',
                'contenu_ar' => 'نص تجريبي',
                'lien_pdf' => 'pdfs/loi12-90.pdf',
                'categorie_id' => 1,
                'domaine_id' => 1,
            ],

            [
                'titre_fr' => 'Loi sur l’habitat',
                'titre_ar' => 'قانون السكن',
                'numero' => '25-90',
                'date_publication' => '1993-04-10',
                'contenu_fr' => 'Texte de démonstration',
                'contenu_ar' => 'نص تجريبي',
                'lien_pdf' => 'pdfs/loi25-90.pdf',
                'categorie_id' => 1,
                'domaine_id' => 2,
            ],

            [
                'titre_fr' => 'Décret relatif à l’urbanisme',
                'titre_ar' => 'مرسوم يتعلق بالتعمير',
                'numero' => '2-92-832',
                'date_publication' => '1992-12-14',
                'contenu_fr' => 'Texte de démonstration',
                'contenu_ar' => 'نص تجريبي',
                'lien_pdf' => 'pdfs/decret.pdf',
                'categorie_id' => 2,
                'domaine_id' => 4,
            ],

        ]);
    }
}