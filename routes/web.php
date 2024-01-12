<?php


use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\TrackController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TrackController::class, 'index'])->name('track.index');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/tracks/create', [TrackController::class, 'create'])->name('track.create');

    Route::get('/tracks/{track}/edit', [TrackController::class, 'edit'])->name('track.edit');

    Route::put('/tracks/{track}', [TrackController::class, 'update'])->name('track.update');

    Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->name('track.destroy');

    Route::post('/tracks', [TrackController::class, 'store'])->name('track.store');

    //Playlist

    Route::resource('playlists', PlaylistController::class)->except('edit','update');

    Route::resource('apiKeys', ApiKeyController::class)->except('edit','update');

});

Route::get('home', [HomeController::class, 'index']);
