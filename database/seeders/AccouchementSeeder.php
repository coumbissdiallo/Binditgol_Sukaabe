<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Maternite;
use App\Models\Accouchement;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccouchementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $maternites = Maternite::inRandomOrder()->take(10)->get();
    $agent = User::where('email', 'maternite@gmail.com')->first();
    $mat = Maternite::find($agent->id_maternite);



        foreach ($maternites as $i => $maternite) {
            Accouchement::create([
                'nom_mere' => 'Nom-mére' . $i,
                'prenom_mere' => 'Prénom-mère' . $i,
                'cni_mere' => 'cni-mere' . $i,
                'nom_pere' => 'Nom-père' . $i,
                'prenom_pere' => 'Prénom-père' . $i,
                'cni_pere' => 'cni-mere' . $i,
                'date_naissance' => now()->subDays(rand(1, 365)),
                'heure_naissance' => Carbon::createFromTime(rand(0,23), rand(0,59)),
                'id_maternite' => $mat->id,
                'id_agent' => $agent->id,
            ]);
        }
    }
}
