<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CategoriaRecetasController extends Controller
{
  private $messages;
  private $codes;

  public function __construct()
  {
    $this->messages = Arr::dot(config('constants.messages'));
    $this->codes = Arr::dot(config('constants.http_codes'));
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return response()->json(Categoria::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $categorias_receta = new Categoria($request->all());
    if ($categorias_receta->save()) {
      return response()->json($this->messages['create.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['create.fail'], $this->codes['error']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Categoria  $categorias_receta
   * @return \Illuminate\Http\Response
   */
  public function show(Categoria $categorias_receta)
  {
    return response()->json($categorias_receta);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Categoria  $categorias_receta
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Categoria $categorias_receta)
  {
    $categorias_receta->fill($request->all());
    if ($categorias_receta->save()) {
      return response()->json($this->messages['update.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['update.fail'], $this->codes['error']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Categoria  $categorias_receta
   * @return \Illuminate\Http\Response
   */
  public function destroy(Categoria $categorias_receta)
  {
    if ($categorias_receta->delete()) {
      return response()->json($this->messages['delete.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['delete.fail'], $this->codes['error']);
  }
}
