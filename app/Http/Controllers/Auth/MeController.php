<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class MeController extends Controller
{
    public function show(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                throw new AuthenticationException('Non authentifié');
            }

            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ], 200);
        } catch (AuthenticationException $e) {
            return response()->json([
                'message' => 'Non authentifié.',
            ], 403);
        }
    }
}
