<?php

namespace App\Http\Controllers;

use App\Models\Accouchement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccouchementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agent = Auth::user();
        $affichageliste = Accouchement::where('id_maternite', $agent->id_maternite)->get();

       return view ('dashboard.partials.maternite.index' , compact('affichageliste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('dashboard.partials.maternite.form');
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([ 
        'nom_mere' => 'required|string',
        'prenom_mere' => 'required|string',
        'cni_mere' => 'required|string',
        'nom_pere' => 'nullable|string',
        'prenom_pere' => 'nullable|string',
        'cni_pere' => 'nullable|string',
        'date_naissance' => 'required|date',
        'heure_naissance' => 'required',
        'id_maternite' => 'required',
            
        ]);
             $agent = Auth::user();

        //  Vérification de cohérence
    if ($agent->id_commune != $request->id_commune || $agent->id_maternite != $request->id_maternite) {
        return back()->withErrors([
            'unauthorized' => 'Vous ne pouvez pas enregistrer un accouchement hors de votre zone.'
        ]);
    }

        $accouchement=new accouchement();
        $accouchement->nom_mere=$request->input('nom_mere');
        $accouchement->prenom_mere=$request->input('prenom_mere');
        $accouchement->cni_mere=$request->input('cni_mere');
        $accouchement->nom_pere=$request->input('nom_pere');
        $accouchement->prenom_pere=$request->input('prenom_pere');
        $accouchement->cni_pere=$request->input('cni_pere');
        $accouchement->date_naissance=$request->input('date_naissance');
        $accouchement->heure_naissance=$request->input('heure_naissance');
        $accouchement->id_maternite = $request->input('id_maternite');
        $accouchement->id_agent = $agent->id;



        $accouchement->save();
        return redirect()->route ('maternite.enregistrements.form')->with('success', 'Enregistrement réussi');
    }

    /**
     * Display the specified resource.
     */
    public function show(accouchement $accouchement)
    {
    return view('dashboard.partials.maternite.details', compact('accouchement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(accouchement $accouchement)
    {
        return view ('dashboard.partials.maternite.edit', compact('accouchement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, accouchement $accouchement)
    {
     $accouchement->nom_mere=$request->input('nom_mere');
        $accouchement->prenom_mere=$request->input('prenom_mere');
        $accouchement->cni_mere=$request->input('cni_mere');
        $accouchement->nom_pere=$request->input('nom_pere');
        $accouchement->prenom_pere=$request->input('prenom_pere');
        $accouchement->cni_pere=$request->input('cni_pere');
        $accouchement->date_naissance=$request->input('date_naissance');
        $accouchement->heure_naissance=$request->input('heure_naissance');
        $accouchement->id_maternite = $request->input('id_maternite');
        $agent = Auth::user();
        $accouchement->id_agent = $agent->id;


        $accouchement->save();
        return redirect()->route ('maternite.liste.index')->with('success', 'Enregistrement réussi');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(accouchement $accouchement)
    {
        //
    }
}
