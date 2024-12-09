<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
  public function login(Request $request)
{
    $validateRules = [
        "email" => "required|string",
        "password" => "required|string"
    ];

    $validation = Validator::make($request->all(), $validateRules);

    if ($validation->fails()) {
        return response()->json([
            "status" => "failed",
            "message" => $validation->errors()->all()
        ]);
    }

    // Correct way to get credentials
    $credentials = $request->only(['email', 'password']);

    if (!Auth::attempt($credentials)) {
        return response()->json([
            "status" => "failed",
            "message" => "Incorrect login details"
        ]);
    }

    return response()->json([
        "status" => "success"
    ]);
}

}
