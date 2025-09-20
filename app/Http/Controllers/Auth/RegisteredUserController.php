<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create() :RedirectResponse
    {
    
       return redirect()->route('choose.role');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /*c pour l'input de type hidden pour récupérer le role en meme temps que l'envoi*/
        $role=$request->input('role');

        /*les champs communs des roles*/
        $rules= [
        'nom' => ['required', 'string', 'max:255'],
        'prenom' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'telephone' => ['required', 'string', 'max:20'],
        'region' => ['required', 'string'],
        'id_commune' => ['required', 'exists:communes,id'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

         /*affichage des champs spécifiques pour chaque role*/
         switch ($role) {
            case 'officier':
            case 'agent':
            case 'maternite':
            $rules['cle'] = ['nullable', 'string']; // pas encore required
                break;
            }

/*valider les données*/
$validated = $request->validate($rules);

/*création des users*/
    $user = User::create([
    'nom' => $validated['nom'],
    'prenom' => $validated['prenom'],
    'email' => $validated['email'],
    'telephone' => $validated['telephone'],
    'region' => $validated['region'],
    'id_commune' => $validated['id_commune'],
    'password' => Hash::make($validated['password']),
    'role' => $role,

    // Champs spécifiques
    'cle' => $validated['cle'] ?? null,
]);
$user->assignRole($role); // si $role = 'parent', 'officier', etc.

     
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
    public function showFormForRole(string $role): View
{
    $regions = \App\Models\Commune::select('region')->distinct()->get();
    return view('auth.register.form', compact('regions', 'role'));
}

}
