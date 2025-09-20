<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use App\Models\Maternite;
use Illuminate\Http\Request;
use App\Models\ActeNaissance;
use Illuminate\Support\Carbon;
use App\Models\DeclarationNaissance;
use Illuminate\Support\Facades\Auth;

class DashboardOfficierController extends Controller
{
    //pour afficher le tableau de bord d' officer
   public function index (){

    //pour lier officier à une commune
    $communeId = Auth::user()->id_commune;

    //compter les enfants par sexe et les affichés
        $nbGarçons = Enfant::where('sexe', 'masculin')
    ->whereHas('accouchement.maternite', function ($query) use ($communeId) {
        $query->where('id_commune', $communeId);
    })->count();


        $nbFilles = Enfant::where('sexe' , 'feminin')
            ->whereHas ('accouchement.maternite' , function ($query) use ($communeId){
                $query->where('id_commune' , $communeId);
            })->count();

            $nbTotal= $nbGarçons + $nbFilles;

            //recupération des maternités liés à une commune 
            $maternites = Maternite::where ('id_commune' , $communeId)->get();

    return view ('dashboard.partials.officier.dashboardoff' , compact('nbGarçons', 'nbFilles', 'maternites' , 'nbTotal'));

}

    //pour gérer les déclarations en attente 
public function declarationProvisoire ()

    {

    $communeId = Auth::user()->id_commune;

    $declarationsAttente = DeclarationNaissance::with ('enfant')
         ->where('statut' ,'en attente')
        ->whereHas('accouchement.maternite' , function ($query) use ($communeId){
        $query->where('id_commune' , $communeId);
        })->get();

    return view ('dashboard.partials.officier.declarationpro', compact('declarationsAttente'));
}

    //validation des déclarations en acte de naissance
    public function validerDeclaration($id)
    {
    
        $declarations = DeclarationNaissance::with('enfant')->findOrFail($id);

    // Créer l'acte
    ActeNaissance::create([
        'anne_acte' => Carbon::createFromDate(now()->year, 1, 1),
        'numero_registre' => $this->generateNumero(),
        'datesignature' => now(),
        'id_commune' => Auth::user()->id_commune,
        'id_signatureofficier' => Auth::id(),
        'id_enfant' => $declarations->id_enfant,
        'id_declaration' => $declarations->id,
    ]);

        //changer le statut de la déclaration
    $declarations->update(['statut' => 'validée']);

    return redirect()->back()->with('success', 'Acte de naissance créé avec succès.');

    }

    //pour gérer les numéros de régistre
    private function generateNumero()
{
    $lastActe = ActeNaissance::whereYear('created_at', now()->year)
        ->orderBy('numero_registre', 'desc')
        ->first();

    return $lastActe ? $lastActe->numero_registre + 1 : 1;
}




}
