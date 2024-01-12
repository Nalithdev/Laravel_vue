<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        $apikeys = $user->apikeys;
        return Inertia::render('ApiKey/Index',
        ['apikeys' => $apikeys
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ApiKey/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);
        ApiKey::create([
            'name' => $request->name,
            'key' => 'key-'.uniqid(),
            'uuid' => 'key-'.uniqid(),
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('apikeys.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();
        return redirect()->route('apiKeys.index');
    }
}
