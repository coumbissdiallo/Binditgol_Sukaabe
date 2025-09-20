<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChoixRole extends Controller
{
   // le choix du role avant inscription
   public function showRoleForm (){
        return view('auth.choixrole');
}

public function handleRoleSelection(Request $request)
{
    $role = $request->input('role');

    $rolesValides = ['parent', 'officier', 'asc', 'agent', 'maternite'];

    if (in_array($role, $rolesValides)) {
        return redirect()->route('register.role', ['role' => $role]);
    }

    return back()->with('error', 'Veuillez choisir un rôle valide.');
}


}
