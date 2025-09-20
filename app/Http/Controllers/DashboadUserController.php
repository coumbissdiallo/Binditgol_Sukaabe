<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use App\Models\Maternite;
use App\Models\Accouchement;
use Illuminate\Http\Request;
use App\Models\ActeNaissance;
use App\Models\DeclarationNaissance;
use Illuminate\Support\Facades\Auth;

class DashboadUserController extends Controller
{
    public function index () {
  
  $user = Auth::user();
    $role = $user->roles->first()->name; 

    $data = [];

    if ($role === 'officier') {
        $communeId = $user->id_commune;

        $nbFilles = Enfant::where('sexe', 'feminin')
            ->whereHas('accouchement.maternite', fn($q) => $q->where('id_commune', $communeId))
            ->count();

        $nbGarçons = Enfant::where('sexe', 'masculin')
            ->whereHas('accouchement.maternite', fn($q) => $q->where('id_commune', $communeId))
            ->count();

        $nbTotal = $nbFilles + $nbGarçons;

        $maternites = Maternite::where('id_commune', $communeId)->get();

        $data = compact('nbFilles', 'nbGarçons', 'nbTotal', 'maternites');
    }

    if (in_array($role, ['officier', 'agent'])) {
        $actes = ActeNaissance::with('enfant')->where('id_commune', $user->id_commune)->get();
        $data['actes'] = $actes;
    }

    if ($role === 'maternite') {
      $data['affichageliste'] = Accouchement::all();
    }

    if (in_array($role, ['parent', 'asc'])) {
    $declarations = DeclarationNaissance::with('enfant')->where('id_createur', Auth::id())->get();
    $data['declarations']=$declarations;
    }
    



    return view('dashboard', $data);

      }
}
