<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $ApyKey = ApiKey::where('key', request()->header('x-api-key'))->firstOrFail();
        $playlists = $ApyKey->user->playlists()->get();

        return response()->json([
            'message' => $playlists->all(),

        ]);
    }
}
