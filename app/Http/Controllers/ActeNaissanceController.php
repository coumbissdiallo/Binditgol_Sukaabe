<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActeNaissance;
use Illuminate\Support\Facades\Auth;

class ActeNaissanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communeId = Auth::user()->id_commune;

    $actes = ActeNaissance::with('enfant', 'declarationNaiss', 'commune', 'officier')
        ->where('id_commune', $communeId)
        ->get();

        return view ('dashboard.partials.registres-index', compact('actes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     $actes = ActeNaissance::with('enfant', 'declarationNaiss', 'commune', 'officier')->findOrFail($id);
    return view('dashboard.partials.registre-show', compact('actes'));
    
    $acte->declarationNaiss->enfant->accouchement->heure_naissance;
    $officier = User::find($actes->id_signatureofficier);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActeNaissance $acteNaissance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActeNaissance $acteNaissance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActeNaissance $acteNaissance)
    {
        //
    }
}
