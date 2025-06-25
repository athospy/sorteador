<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// react form for registering the product purchase
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/sorteo', function () {
    $clients = \App\Models\Cliente::all();
    $clienteMap = $clients->keyBy('id');
    $winnersArray = \App\Models\Ganador::orderBy('id', 'desc')
        ->get();
    $winners = [];
    // Create a map of client IDs to client objects for quick access
    // Iterate through the winners and create a display text for each
    // winner using the client information
    // and the winner's creation date
    // Example: "John Doe - New York - Store A - 123 - Product X - 123456789 - 2023-10-01 12:00:00"
    foreach ($winnersArray as $winnerObject) {
        $cliente = $clienteMap[$winnerObject->cliente_id];
        $displayText = $cliente->nombre . ' - ' . $cliente->ciudad . ' - ' . $cliente->local . ' - ' . $cliente->nro_factura . ' - ' . $cliente->producto . ' - ' . $cliente->cedula . ' - ' . $winnerObject->created_at;
        array_push($winners, $displayText);
    }
    return Inertia::render('Sorteo', [
        'clientes' => $clients,
        'ganadores' => $winners,
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

require __DIR__ . '/auth.php';
