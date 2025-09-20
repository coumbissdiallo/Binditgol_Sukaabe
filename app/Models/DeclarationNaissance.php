<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeclarationNaissance extends Model
{
 protected $fillable =[
        'date_declaration',
            'statut',
            'id_enfant',
            'id_createur',
            'id_accouchement',
    ];

   public function utilisateurs(){
        return $this->belongsTo(user::class,'id_createur');
    }
    public function accouchement()
{
    return $this->belongsTo(Accouchement::class ,'id_accouchement');
}


    public function acteNaissance(){
    return $this->hasOne(ActeNaissance::class ,'id_declaration');
    } 

    public function enfant(){
    return $this->belongsTo(Enfant::class , 'id_enfant');
    } 
    
}
