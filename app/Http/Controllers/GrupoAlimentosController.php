<?php

namespace App\Http\Controllers;

use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GrupoAlimentosController extends Controller
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
      return response()->json($this->messages['create.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['create.fail'], $this->codes['error']);
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
      return response()->json($this->messages['update.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['update.fail'], $this->codes['error']);
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
      return response()->json($this->messages['delete.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['delete.fail'], $this->codes['error']);
  }
}
