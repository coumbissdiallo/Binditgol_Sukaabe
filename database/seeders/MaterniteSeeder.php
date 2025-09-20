<?php

namespace Database\Seeders;

use App\Models\Maternite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaterniteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
    //les maternités à Kaffrine
       Maternite::create([
            'nom_maternite' => 'Centre de Santé de Kougheul',
            'id_commune' => 1,
        ]);
        Maternite::create([
            'nom_maternite' => 'Poste de santé de Hodar',
            'id_commune' => 2,
        ]);
        Maternite::create([
            'nom_maternite' => 'Centre de Santé Birkilane',
            'id_commune' => 3,
        ]);
        Maternite::create([
            'nom_maternite' => 'Poste de Santé Birikilane rue 20',
            'id_commune' => 3,
        ]);


    //les mternités à Fatick
        Maternite::create([
            'nom_maternite' => 'Poste de santé de Foundioune',
            'id_commune' => 4,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité de Toubacouta',
            'id_commune' => 5,
        ]);

    //les maternités à kaolack
        Maternite::create([
            'nom_maternite' => 'Centre de Santé keur Socé',
            'id_commune' => 6,
        ]);
        Maternite::create([
            'nom_maternite' => 'Centre de Santé keur Socé 2',
            'id_commune' => 6,
        ]);

        
    //les maternités à thies
        Maternite::create([
            'nom_maternite' => 'Hôpital Abdoul Aziz Sy Dabakh',
            'id_commune' => 7,
        ]);
        Maternite::create([
            'nom_maternite' => 'Centre de santé Massamba Sall',
            'id_commune' => 7,
        ]);
        Maternite::create([
            'nom_maternite' => 'Hopital régional de thiés',
            'id_commune' => 8,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité de l’Hôpital régional de Thiès',
            'id_commune' => 8,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité de la Cité Lamine',
            'id_commune' => 8,
        ]);
        Maternite::create([
            'nom_maternite' => 'Poste de santé de Médine',
            'id_commune' => 9,
        ]);
        Maternite::create([
            'nom_maternite' => 'Centre de Santé de Grand Mbour',
            'id_commune' => 9,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité Soeurs du Sacré Coeur',
            'id_commune' => 10,
        ]);
        
    //les maternités à Diourbel
        Maternite::create([
            'nom_maternite' => 'Poste de santé de Diourbel',
            'id_commune' => 11,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité Mame Diarra Boussa -poste croix rouge',
            'id_commune' => 12,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité de Sadio',
            'id_commune' => 12,
        ]);
        Maternite::create([
            'nom_maternite' => 'Poste de santé de bambey',
            'id_commune' => 13,
        ]);

    //les maternités à Casamance
        Maternite::create([
            'nom_maternite' => 'Hôpital Régional de Ziguinchor',
            'id_commune' => 14,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité Diabire',
            'id_commune' => 14,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité Elinkine',
            'id_commune' => 14,
        ]);
        Maternite::create([
            'nom_maternite' => 'Hôpital Régional de Kolda',
            'id_commune' => 15,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité de Sarré Moussa',
            'id_commune' => 15,
        ]);
        Maternite::create([
            'nom_maternite' => 'Maternité de Médina Mary Cissé',
            'id_commune' => 15,
        ]);
        Maternite::create([
            'nom_maternite' => 'Centre Régional Amadou Tidiane Ba',
            'id_commune' => 16,
        ]);
        Maternite::create([
            'nom_maternite' => 'Poste de santé de Bafata',
            'id_commune' => 16,
        ]);

//les maternités à saint louis
        Maternite::create([
            'nom_maternite' => 'centre de santé Amadou Malick Gaye',
            'id_commune' => 17,
        ]);
        Maternite::create([
            'nom_maternite' => 'Poste de santé Ngendar',
            'id_commune' => 17,
        ]);
        Maternite::create([
            'nom_maternite' => 'poste de santé de Tassiner / Gandiol',
            'id_commune' => 18,
        ]);




    }


}
