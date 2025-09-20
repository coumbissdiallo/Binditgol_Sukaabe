<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeclarationNaissance;
use Illuminate\Support\Facades\Auth;

class DashboardAgentController extends Controller
{
   
    public function agentDeclarationPro (){

        $communeId = Auth::user()->id_commune;

    $declarationsAttente = DeclarationNaissance::with ('enfant')
        -> where('statut' ,'en attente')
        ->whereHas('accouchement.maternite' , function ($query) use ($communeId){
        $query->where('id_commune' , $communeId);
        })->get();


    return view ('dashboard.partials.agent.declaration-pro' , compact('declarationsAttente'));

}




}
