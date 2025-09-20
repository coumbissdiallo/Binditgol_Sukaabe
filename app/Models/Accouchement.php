<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accouchement extends Model
{
 protected $fillable =[
            'nom_mere',
            'prenom_mere',
            'cni_mere',
            'nom_pere',
            'prenom_pere',
            'cni_pere',
            'date_naissance',
            'heure_naissance',
            'id_maternite',
            'id_agent',
            
    ];

public function enfants(){
    return $this->hasMany(Enfant::class);
    } 
    
    public function declaration()
{
    return $this->hasOne(DeclarationNaissance::class);
}


    public function agent(){
    return $this->belongsTo(User::class, 'id_agent');
    } 

    public function maternite()
{
    return $this->belongsTo(Maternite::class,'id_maternite');
}

}
