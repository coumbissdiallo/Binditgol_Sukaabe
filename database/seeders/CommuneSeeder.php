<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communes= [
        ['nom_commune' => 'Koungheul', 'region' => 'Kaffrine', 'localite' => 'Koungheul Centre'],
        ['nom_commune' => 'Malem Hodar', 'region' => 'Kaffrine', 'localite' => 'Malem'],
        ['nom_commune' => 'Birkilane', 'region' => 'Kaffrine', 'localite' => 'Birkilane'],
        ['nom_commune' => 'Foundiougne', 'region' => 'Fatick', 'localite' => 'Ndorong'],
        ['nom_commune' => 'Toubacouta', 'region' => 'Fatick', 'localite' => 'Toubacouta'],
        ['nom_commune' => 'Keur Socé', 'region' => 'Kaolack', 'localite' => 'Socé'],
        ['nom_commune' => 'Tivaoune', 'region' => 'thies', 'localite' => 'Tivaoune'],
        ['nom_commune' => 'Thies Est', 'region' => 'Thies', 'localite' => 'Thies Est'],
        ['nom_commune' => 'Mbour', 'region' => 'Thies', 'localite' => 'Mbour'],
        ['nom_commune' => 'Saly', 'region' => 'Thies', 'localite' => 'Saly'],
        ['nom_commune' => 'Dourbel', 'region' => 'Diourbel', 'localite' => 'Dioourbel'],
        ['nom_commune' => 'Mbacké', 'region' => 'Diourbel', 'localite' => 'Mbacké'],
        ['nom_commune' => 'Bambey', 'region' => 'Diourbel', 'localite' => 'Bambey'],
        ['nom_commune' => 'Ziguinchor', 'region' => 'Casamance', 'localite' => 'Ziguinchor'],
        ['nom_commune' => 'Kolda', 'region' => 'Casamance', 'localite' => 'Kolda'],
        ['nom_commune' => 'Sédhiou', 'region' => 'Casamance', 'localite' => 'Sédhiou'],
        ['nom_commune' => 'Podor', 'region' => 'Saint-louis', 'localite' => 'Podor'],
        ['nom_commune' => 'Gandiol', 'region' => 'Saint-louis', 'localite' => 'Gandiol'],







        




    ];

    foreach ($communes as $commune) {
    DB::table('communes')->insert([
        'nom_commune' => $commune['nom_commune'],
        'region' => $commune['region'],
        'localite' => $commune['localite'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    }
}

}
