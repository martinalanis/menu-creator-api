<?php

namespace App\Http\Controllers;

use App\Provedor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class ProvedorController extends Controller
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
    return response()->json(Provedor::all());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $provedor = new Provedor($request->all());
    if ($provedor->save()) {
      return response()->json($this->messages['create.success'], Response::HTTP_OK);
    }

    return response()->json($this->messages['create.fail'], Response::HTTP_CONFLICT);

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $provedor = Provedor::find($id);
    return response()->json($provedor);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $provedor = Provedor::find($id);
    $provedor->fill($request->all());
    if ($provedor->save()) {
      return response()->json($this->messages['update.success'], Response::HTTP_OK);
    }

    return response()->json($this->messages['update.fail'], Response::HTTP_CONFLICT);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    if (Provedor::destroy($id)) {
      return response()->json($this->messages['delete.success'], Response::HTTP_OK);
    }

    return response()->json($this->messages['delete.fail'], Response::HTTP_CONFLICT);
  }
}
