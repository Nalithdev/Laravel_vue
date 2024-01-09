<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function index(){

        $track = Track::where('display', true)->orderby('title')->get();

        return Inertia::render('Track/Index',[
            'track' => $track
        ]);
    }
    public function create(){

        return Inertia::render('Track/Create');
    }
    public function store(Request $request){
        $request->validate([
            'title' =>  ['string', 'required', 'max:255'],
            'artist' => ['string', 'required', 'max:255'],
            'image' => ['image', 'required' , 'extensions:jpg,png'],
            'music' => ['file','required', 'extensions:mp3,wav'],
            'display' => ['bool', 'required', 'max:255'],



        ]);
        $uuid = 'trk-'. Str::uuid();
        $extension = $request->image->extension();
        $imagepath =$request->image->storeAs('/tracks/images', $uuid . '.'.$extension);
        $extension_music = $request->music->extension();
        $musicpath =$request->music->storeAs('/tracks/musics', $uuid . '.'.$extension_music);
        Track::create([
            'uuid' => $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'image' => $imagepath,
            'music' => $musicpath,
            'display' => $request->display,
        ]);
        return redirect()->route('track.index');


    }
}
