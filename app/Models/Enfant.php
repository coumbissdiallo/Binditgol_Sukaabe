<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    protected $fillable =[
        'nom_enfant',
        'prenom_enfant',
        'sexe',
        'date_naissance',
        'heure_naissance',
        'id_parent',
        'id_accouchement',

    ];

 public function declarationNaissance(){
    return $this->hasOne(DeclarationNaissance::class);
    } 

     public function parent(){
    return $this->belongsTo(User::class, 'id_parent');
    } 

    public function  accouchement(){
    return $this->belongsTo(Accouchement::class , 'id_accouchement');
    } 

    public function acteNaissance(){
    return $this->hasOne(ActeNaissance::class);
    } 



}
