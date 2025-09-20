<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use App\Models\Commune;
use App\Models\Maternite;
use App\Models\Accouchement;
use App\Models\ActeNaissance;
use Illuminate\Http\Request;
use App\Models\DeclarationNaissance;
use Illuminate\Support\Facades\Auth;

class DeclarationNaissanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    $declarations = DeclarationNaissance::with('enfant' , 'acteNaissance')
    ->where('id_createur', Auth::id())->get();
    return view('dashboard.partials.parent.liste-enregistrements', compact('declarations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
     /*pour l'affichage du formulaire de déclaration*/ 
       $accouchement = Accouchement::findOrFail($request->query('id_accouchement'));
       return view('dashboard.partials.parent.form-declarer' , compact ('accouchement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'id_accouchement' => 'required|exists:accouchements,id',
    ]);

    /*declaration d'un enfant d'abord*/ 
    $accouchement = Accouchement::findOrFail($request->id_accouchement);

        $enfant = new Enfant();
        $enfant->id = $request->id;
        $enfant->nom_enfant = $request->nom_enfant;
        $enfant->prenom_enfant = $request->prenom_enfant;
        $enfant->sexe = $request->sexe;
        $enfant->date_naissance = $accouchement->date_naissance;
        $enfant->heure_naissance = $accouchement->heure_naissance;
        $enfant->id_accouchement = $accouchement->id;
        $enfant->id_parent = Auth::id();

        $enfant->save(); 


/*création de la déclaration de naissance */
        $declarations = new DeclarationNaissance();
        $declarations->id_accouchement = $request->id_accouchement;
        $declarations->id_createur = Auth::id(); // parent connecté 
        $declarations->id_enfant = $enfant->id;  //associé une déclaration à un enfant
        $declarations->date_declaration = now(); // date actuelle
        $declarations->statut = 'en attente'; // ou 'validée' selon ton workflow


        $declarations->save();

        return redirect()->route('parent.liste.enregistrements')->with('success', 'Déclaration enregistrée avec succès.');

}
    

    /**
     * Display the specified resource.
     */
    public function show(DeclarationNaissance $declarationNaissance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeclarationNaissance $declarationNaissance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeclarationNaissance $declarationNaissance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeclarationNaissance $declarationNaissance)
    {
        //
    }

    /*récupération du premier formulaire de vérification*/
    public function verifierIdentite(Request $request)
    {
       $request->validate([
        'id_commune'=>'required|exists:communes,id',
        'id_maternite'=>'required|exists:maternites,id',
        'prenom_mere'=>'required|string',
        'nom_mere'=>'required|string',
        'cni_mere'=>'required|string',
       ]);

       /*vérifier si ces identités existes dans la table accouchement*/ 
       $accouchement= Accouchement::where('prenom_mere', $request->prenom_mere)
                  ->where('nom_mere', $request->nom_mere)
                  ->where('cni_mere', $request->cni_mere)
                  ->where('id_maternite', $request->id_maternite)
                  ->whereHas('maternite', function ($query) use ($request) {
                    $query->where('id_commune', $request->id_commune);
                })

                  ->first();

    if (!$accouchement) {
        return back()->withErrors(['identite' => 'Parent non reconnu.']);
    }

    /*si tout  est bon rediriger */
    return redirect()->to(route('parent.form-declaration') .
     '?id_accouchement=' . $accouchement->id);

     }
/*pour afficher les élements  du formulaire*/
public function afficherFormVerification()
    {
      $communes=Commune::all();
       $maternites = Maternite::all();
       return view('dashboard.partials.parent.declarer', compact('communes','maternites'));
    }
    

}
