<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogInController extends Controller
{
  public function __invoke(Request $request)
  {
    if (!$token = auth()->attempt($request->only('email', 'password'))) {
      return response(['message' => 'Usuario o contraseña incorrecta'], Response::HTTP_UNAUTHORIZED);
    }

    return response()->json(compact('token'));
  }
}
