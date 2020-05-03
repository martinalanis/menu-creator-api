<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  protected $fillable = [
    'nombre',
    'tag'
  ];

  public function insumos()
  {
    return $this->hasMany('App\Insumo');
  }
}
