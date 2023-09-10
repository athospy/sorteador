<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/sorteo', function () {
    $clientes = \App\Models\Cliente::all();
    $clienteMap=$clientes->keyBy('id');
    $ganadoresArray = \App\Models\Ganador::orderBy('id', 'desc')
    ->get();
    $ganadores=[];
    foreach ($ganadoresArray as $ganador) {
        $cliente=$clienteMap[$ganador->cliente_id];
        $texto=$cliente->nombre.' - '.$cliente->ciudad.' - '.$cliente->local.' - '.$cliente->nro_factura.' - '.$cliente->producto.' - '.$cliente->cedula.' - '.$ganador->created_at;
        array_push($ganadores, $texto);
    }
    return Inertia::render('Sorteo', [
        'clientes' => $clientes,
        'ganadores' => $ganadores,
    ]);
});

/*
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';
