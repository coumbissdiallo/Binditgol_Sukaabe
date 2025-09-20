<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActeNaissance extends Model
{
  protected $fillable =[
        'anne_acte',
        'numero_registre',
        'datesignature',
        'id_commune',
        'id_signatureofficier',
        'id_enfant',
        'id_declaration',
    ];

    public function declarationNaiss(){
    return $this->belongsTo(DeclarationNaissance::class , 'id_declaration');
    }

    public function enfant(){
    return $this->belongsTo(Enfant::class , 'id_enfant');
    } 

    public function commune(){
    return $this->belongsTo(commune::class , 'id_commune');
    } 

public function officier(){
    return $this->belongsTo(User::class, 'id_signatureofficier');
    }
}
