<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessKey extends Model
{
  protected $fillable= [
        'code_cle',
        'id_commune',
        'id_commune',
        'id_role',
    ];

  public function role(){
        return $this->belongsTo(Role::class);
    }

    public function commune(){
        return $this->belongsTo(Commune::class);
    }
}
