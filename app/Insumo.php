<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
  protected $fillable = [
    'provedor_id',
    'grupo_id',
    'producto',
    'clave',
    'marca',
    'presentacion',
    'unidad',
    'calorias',
    'precio',
    'merma'
  ];

  public function grupo()
  {
    return $this->belongsTo('App\Grupo');
  }

  public function provedor()
  {
    return $this->belongsTo('App\Provedor');
  }
}
