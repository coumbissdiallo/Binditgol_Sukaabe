<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
   protected $fillable =[
    'nom_commune',
    'region',
    'localite'
   ];

   public function maternite(){
    return $this->hasMany(Maternite::class);
   }
}
