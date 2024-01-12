<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;


class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        $playlists = $user->playlists()->withCount('tracks')->get();
        return Inertia::render('Playlist/Index' , [
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks = Track::where('display', true)->orderby('title')->get();
        return Inertia::render('Playlist/Create',
        [ 'tracks' => $tracks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>  ['string', 'required', 'max:255'],
            'tracks' => ['required', 'array'],
            'tracks.*' => ['required', 'string', 'exists:tracks,uuid'],
        ]);

        $tracks = Track::whereIn('uuid', $request->tracks)->get();
        if($tracks->count() !== count($request->tracks)){
            throw ValidationException::withMessages(['tracks' => 'Invalid track in array']);
        }
        Playlist::create([
            'uuid' => 'pl-'.uniqid(),
            'title' => $request->title,
            'user_id' => $request->user()->id,
        ])->tracks()->attach($tracks);

        return redirect()->route('playlists.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        return Inertia::render('Playlist/Show', [
            'playlist' => $playlist->load('tracks')
        ]);
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
    public function destroy(Playlist $playlist)
    {
        //
    }
}
