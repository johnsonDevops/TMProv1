<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {  return view('dashboard'); })->name('dashboard');
    Route::get('/mytravel', function () { return view('mytravel.index'); })->name('mytravel.index');
    Route::get('/contacts', function () { return view('contacts.index'); })->name('contacts.index');
    // 
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/{id}', [CalendarController::class, 'show'])->name('calendar.show');

});
