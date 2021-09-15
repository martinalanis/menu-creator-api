<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class CategoriaRecetasController extends Controller
{
  private $messages;

  public function __construct()
  {
    $this->messages = Arr::dot(config('constants.messages'));
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
      return response()->json($this->messages['create.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['create.fail'], Response::HTTP_CONFLICT);
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
      return response()->json($this->messages['update.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['update.fail'], Response::HTTP_CONFLICT);
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
      return response()->json($this->messages['delete.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }
}
