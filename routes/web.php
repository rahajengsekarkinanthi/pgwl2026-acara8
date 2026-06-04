<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\post;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [PageController::class, 'landingpage'])->name('home');

Route::get('/peta', [PageController::class, 'peta'])
->middleware(['auth', 'verified'])
->name('peta');

Route::get('/tabel', [PageController::class, 'tabel'])->name('tabel');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::post('/points', [PointsController::class, 'store'])->name('points.store');

Route::delete('/delete-points/{id}', [PointsController::class, 'destroy'])->name('points.delete');

Route::get('/edit-points/{id}', [PointsController::class, 'edit'])->name('points.edit');

Route::patch('/update-point/{id}', [PointsController::class, 'update'])->name('point.update');

Route::post('/polylines', [PolylinesController::class, 'store'])->name('polylines.store');

Route::delete('/delete-polylines/{id}', [PolylinesController::class, 'destroy'])->name('polylines.delete');

Route::get('/edit-polylines/{id}', [PolylinesController::class, 'edit'])->name('polylines.edit');

Route::patch('/update-polyline/{id}', [PolylinesController::class, 'update'])->name('polyline.update');

Route::post('/polygons', [PolygonsController::class, 'store'])->name('polygons.store');

Route::delete('/delete-polygons/{id}', [PolygonsController::class, 'destroy'])->name('polygons.delete');

Route::get('/edit-polygons/{id}', [PolygonsController::class, 'edit'])->name('polygons.edit');

Route::patch('/polygon-point/{id}', [PolygonsController::class, 'update'])->name('polygon.update');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';