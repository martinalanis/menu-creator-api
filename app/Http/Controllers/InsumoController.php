<?php

namespace App\Http\Controllers;

use App\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class InsumoController extends Controller
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
    return response()->json(Insumo::with('grupo')->orderBy('created_at', 'DESC')->get());
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
      return response()->json($this->messages['create.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['create.fail'], Response::HTTP_CONFLICT);
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
      return response()->json($this->messages['delete.success'], Response::HTTP_OK);
    }
    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }

  public function verify($clave)
  {
    return response()->json(Insumo::where('clave', $clave)->exists());
  }
}
