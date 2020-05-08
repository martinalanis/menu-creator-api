<?php

namespace App\Http\Controllers;

use App\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InsumoController extends Controller
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
    return response()->json(Insumo::with('grupo')->get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $insumo = new Insumo($request->all());
    if ($insumo->save()) {
      return response()->json($this->messages['create.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['create.fail'], $this->codes['error']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Insumo  $insumo
   * @return \Illuminate\Http\Response
   */
  public function show(Insumo $insumo)
  {
    return response()->json($insumo);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Insumo  $insumo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Insumo $insumo)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Insumo  $insumo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Insumo $insumo)
  {
    if ($insumo->delete()) {
      return response()->json($this->messages['delete.success'], $this->codes['ok']);
    }
    return response()->json($this->messages['delete.fail'], $this->codes['error']);
  }

  public function verify($clave)
  {
    return response()->json(Insumo::where('clave', $clave)->exists());
  }
}
