<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function index(){

        $track = Track::all();

        return Inertia::render('Track/Index',[
            'track' => $track
        ]);
    }
    public function create(){

        return Inertia::render('Track/Create');
    }
}
