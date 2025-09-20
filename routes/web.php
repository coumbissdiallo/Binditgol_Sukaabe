<?php

use App\Models\DeclarationNaissance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccouchementController;
use App\Http\Controllers\DashboadUserController;
use App\Http\Controllers\ActeNaissanceController;
use App\Http\Controllers\DashboardAgentController;
use App\Http\Controllers\DashboardOfficierController;
use App\Http\Controllers\DeclarationNaissanceController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboadUserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/communes-by-region/{region}', function ($region) {
    return response()->json(
        \App\Models\Commune::where('region', $region)->get(['id', 'nom_commune'])
    );
});

Route::get('/maternites-by-commune/{id_commune}',
 function ($id_commune) { 
    return response()->json( 
        \App\Models\Maternite::where('id_commune', $id_commune)->get(['id', 'nom_maternite']) ); });


/*maternité*/ 
Route::get('/accouchement/liste', [AccouchementController::class, 'index'])->name('maternite.liste.index');
Route::get('/accouchement/enregistrement', [AccouchementController::class, 'create'])->name('maternite.enregistrements.form');
Route::post('/accouchement/enregistrer', [AccouchementController::class, 'store'])->name('maternite.form.store');
Route::get('/accouchement/{accouchement}/details', [AccouchementController::class, 'show'])->name('maternite.liste.details');
Route::get('/accouchement/{accouchement}/edit', [AccouchementController::class, 'edit'])->name('maternite.liste.edit');
Route::put('/accouchement/{accouchement}', [AccouchementController::class, 'update'])->name('maternite.liste.update');

/*parent*/
Route::get('/declaration/liste' , [DeclarationNaissanceController::class , 'index'])->name('parent.liste.enregistrements');
Route::get('/declaration/formulaire' , [DeclarationNaissanceController::class, 'create'])->name('parent.form-declaration');
Route::get('/declaration/verification' , [DeclarationNaissanceController::class, 'afficherFormVerification'])->name('parent.formVerification');
Route::post('/declaration/verification' , [DeclarationNaissanceController::class, 'verifierIdentite'])->name('parent.verification.identite');
Route::post('/declaration' , [DeclarationNaissanceController::class, 'store'])->name('parent.declaration.store');

/*officier*/
Route::get('/tableau-de-bord' , [DashboardOfficierController::class,'index'])->name('officier.tableau-bord');
Route::get('/declaration-provisoires' , [DashboardOfficierController::class,'declarationProvisoire'])->name('officier.declaration-provisoire');
Route::post('/declaration/{id}/valider', [DashboardOfficierController::class, 'validerDeclaration'])->name('declaration.valider');


/*agent civil*/ 
Route::get('/declarations-provisoires' , [DashboardAgentController::class,'agentDeclarationPro'])->name('agent.declaration-provisoire');


/*affiché l'acte de naissance */
Route::get('/registres-naissances', [ActeNaissanceController::class , 'index'])->name('registres.naissances');
Route::get('/actes/{id}', [ActeNaissanceController::class, 'show'])->name('actes.show');


require __DIR__.'/auth.php';
