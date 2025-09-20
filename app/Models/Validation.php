<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
   protected $fillable = [
        'type_validation',
        'mode_signature',
        'date_validation',
        'id_officier',
        'id_declarationNaiss',
    ];

  public function officier(){
        return $this->belongsTo(User::class,'id_officier');
    }

    public function declarationNaissance(){
        return $this->belongsTo(DeclarationNaissance::class,'id_declarationNaiss');
    }
}
