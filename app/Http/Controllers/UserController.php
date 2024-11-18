<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        return response()->json([
            "status" => true,
            "message" => "success",
            "data" => $request->user()
        ]);
    }
}
