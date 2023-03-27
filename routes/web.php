<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BpdfController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DownloadPdfController;

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


    Route::group(['middleware' => ['role:user']], function () {

    Route::get('/dashboard', function () {  return view('dashboard'); })->name('dashboard');
    Route::get('/mytravel', function () { return view('mytravel.index'); })->name('mytravel.index');
    Route::get('/contacts', function () { return view('contacts.index'); })->name('contacts.index');
    // 
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/{id}', [CalendarController::class, 'show'])->name('calendar.show');

    // A paerty PDF download or view for Day sheet per udemy filament course / https://www.youtube.com/watch?v=XeYd_kYkUJE
    Route::get('/pdf/{id}', [DownloadPdfController::class, 'viewDaysheet'])->name('daysheet.pdf.view');
    // Route::get('/pdf/download/{id}', [DownloadPdfController::class, 'generateDaysheet'])->name('daysheet.pdf.download');
    // B paerty PDF
    Route::get('/bpdf/{id}', [DownloadPdfController::class, 'viewBDaysheet'])->name('bdaysheet.pdf.view');
    // C paerty PDF
    Route::get('/cpdf/{id}', [DownloadPdfController::class, 'viewCDaysheet'])->name('cdaysheet.pdf.view');

});


});
