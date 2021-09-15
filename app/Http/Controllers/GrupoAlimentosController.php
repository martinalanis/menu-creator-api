<?php

namespace App\Http\Controllers;

use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class GrupoAlimentosController extends Controller
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
    return response()->json(Grupo::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $grupo = new Grupo($request->all());
    if ($grupo->save()) {
      return response()->json($this->messages['create.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['create.fail'], Response::HTTP_CONFLICT);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Grupo  $grupo
   * @return \Illuminate\Http\Response
   */
  public function show(Grupo $grupo)
  {
    return response()->json($grupo);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Grupo  $grupo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Grupo $grupo)
  {
    $grupo->fill($request->all());
    if ($grupo->save()) {
      return response()->json($this->messages['update.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['update.fail'], Response::HTTP_CONFLICT);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Grupo  $grupo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Grupo $grupo)
  {
    if ($grupo->delete()) {
      return response()->json($this->messages['delete.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }
}
