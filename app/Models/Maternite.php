<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maternite extends Model
{
    protected $fillable =[
    'nom_maternite',
    'id_commune',
   ];

    public function commune(){
        return $this->belongsTo(Commune::class , 'id_commune');
    }

    public function utilisateurs(){
        return $this->hasMany(User::class);
    }

    public function accouchements()
{
    return $this->hasMany(Accouchement::class);
}

}
