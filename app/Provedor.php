<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
  protected $table = 'provedores';

  protected $fillable = [
    'nombre',
  ];

  public function insumos()
  {
    return $this->hasMany('App\Insumo');
  }
}
