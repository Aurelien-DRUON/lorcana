<?php

namespace App\Http\Controllers;

use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Non authentifié.'], 403);
        }

        $sets = Set::all();

        return response()->json($sets);
    }

    public function show($id)
    {
        $set = Set::find($id);

        if (!$set) {
            return response()->json([
                'message' => 'Set non trouvé.'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'id' => $set->id,
            'name' => $set->name,
            'code' => $set->code,
            'release_date' => $set->release_date,
            'card_number' => $set->card_number
        ]);
    }

    public function getCards($id)
    {
        $set = Set::find($id);

        if (!$set) {
            return response()->json([
                'message' => 'Set non trouvé.'
            ], Response::HTTP_NOT_FOUND); // 404
        }

        $cards = $set->cards;

        return response()->json($cards);
    }
}
